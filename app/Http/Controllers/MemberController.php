<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

use Validator;
use Redirect;
use DB;
use Carbon\Carbon;

use App\Models\Member;
use App\Models\MemberCategory;
use App\Models\CustomField;
use App\Models\UserType;

class MemberController extends Controller{

   // Member registration
   public function new(){
      $data['customFields'] = CustomField::where('type', '!=', null)->where('status', 1)->get();
      $data['user_types'] = UserType::where('status', 1)->get();
      return view('admin.member.registration', $data);      
   }

   // Add new member
   public function addMember(Request $request){

      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'email'=>'required|unique:members',
         'password'=>'required|min:6',
         'confirm_password' => 'required|same:password|min:6',
         'mobile'=>'required',
         'address'=>'required',
         'gender'=>'required',
         'dob'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $path="member/";
      $default="default.jpg";
      if ($request->hasFile('photo')){
         if($files=$request->file('photo')){
            $photo = $request->photo;
            $fullName=time().".".$photo->getClientOriginalExtension();
            $files->move(imagePath($path), $fullName);
            $photoLink = imagePath($path). $fullName;
         }
      }else{
         $photoLink = imagePath($default);
      }

      $insertId = DB::table('members')->insertGetId([
         'user_type' => $request->user_type,
         'form_no' => $request->form_no,
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'mobile' => $request->mobile,
         'address' => $request->address,
         'gender' => $request->gender,
         'blood' => $request->blood,
         'dob' => date('Y-m-d', strtotime($request->dob)),
         'photo' => $photoLink
      ]);

      $customFields = CustomField::where('type', '!=', null)->where('status', 1)->get();

      foreach ($customFields as $field) {
         $title = $field->name;
         DB::table('members')->where('id', $insertId)->update([
            $title => $request->$title
         ]);
      }
      return back()->with('success','New member add successfully');
   }

   // Show all member
   public function all(){
      $data['activeMembers'] = DB::table('members')->where('status', 1)->get();
      $data['inactiveMembers'] = DB::table('members')->where('status', 0)->get();
      return view('admin.member.members', $data);
   }

   // Show single member
   public function view($id, $model, $tab){
      $data['single'] =  $itemId = DB::table($model)->find($id);
      $data['customFields'] = CustomField::where('status', 1)->get();

      $allColumns = array_keys(json_decode(Member::first(), true));
      $data['needed_columns'] = array_diff($allColumns, ['id', 'password', 'photo', 'status', 'created_at', 'updated_at']);
      
      return view('admin.user.view', $data);
   }

   // Member category
   public function category(){
      $data['categories'] = MemberCategory::all();
      return view('admin.member.category', $data);
   }

   // Add member category
   public function addCategory(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'paymentType'=>'required',
         'fee'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      MemberCategory::insert([
         'name' => $request->name,
         'paymentType' => $request->paymentType,
         'fee' => $request->fee,
         'percentage' => $request->percentage
      ]);
      return back()->with('success','New category add successfully');
   }
   
   // Status [Active vs Inactive]
   public function itemStatus($id, $model, $tab){
      //Much code because save() function not working...
      $itemId = DB::table($model)->find($id);
      ($itemId->status == true) ? $action=$itemId->status = false : $action=$itemId->status = true;     
      DB::table($model)->where('id', $id)->update(['status' => $action]);
      return back()->with('success', $model.' status change')->withInput(['tab' => $tab]);
   }

   // Delete
   public function itemDelete($id, $model, $tab){
      $itemId = DB::table($model)->find($id);
      if (Schema::hasColumn($model, 'image')){
         ($itemId->image!=null) ? (file_exists($itemId->image) ? unlink($itemId->image) : '') : '';
      }
      DB::table($model)->where('id', $id)->delete();
      return back()->with('success', $model.' delete successfully')->withInput(['tab' => $tab]);
   }    
}
