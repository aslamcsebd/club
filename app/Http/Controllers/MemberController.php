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
      $data['memberCategory'] = MemberCategory::where('status', 1)->get();
      return view('admin.member.registration', $data);      
   }

   // Registration Applications from online
   public function member_form(Request $request){
      $data['customFields'] = CustomField::where('type', '!=', null)->where('status', 1)->get();
      $data['memberCategory'] = MemberCategory::where('status', 1)->get();
      return view('admin.member.online-registration', $data);  
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
         'dob'=>'required',
         'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'member_no'=>'required|unique:members'
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

      if($request->has('member_add_from')){
         $member_add_from = $request->member_add_from;   //Online
      }else{         
         $member_add_from = 'By_admin';
      }

      $insertId = DB::table('members')->insertGetId([
         'member_category' => $request->member_category,
         'member_no' => $request->member_no,
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'mobile' => $request->mobile,
         'address' => $request->address,
         'gender' => $request->gender,
         'blood' => $request->blood,
         'dob' => date('Y-m-d', strtotime($request->dob)),
         'photo' => $photoLink,
         'member_add_from' => $member_add_from
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
   public function online(){
      $data['activeMembers'] = DB::table('members')->where('status', 1)->where('member_add_from', 'Online')->orderBy('id', 'DESC')->get();
      $data['inactiveMembers'] = DB::table('members')->where('status', 0)->where('member_add_from', 'Online')->orderBy('id', 'DESC')->get();
      return view('admin.member.members', $data);
   }
   
   // Show all member
   public function all(){
      $data['activeMembers'] = DB::table('members')->where('status', 1)->where('member_add_from', 'By_admin')->orderBy('id', 'DESC')->get();
      $data['inactiveMembers'] = DB::table('members')->where('status', 0)->where('member_add_from', 'By_admin')->orderBy('id', 'DESC')->get();
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

   // Status [Active vs Inactive]
   // public function itemStatus($id, $model, $tab){
   //    //Much code because save() function not working...
   //    $itemId = DB::table($model)->find($id);
   //    ($itemId->status == true) ? $action=$itemId->status = false : $action=$itemId->status = true;     
   //    DB::table($model)->where('id', $id)->update(['status' => $action]);
   //    return back()->with('success', $model.' status change')->withInput(['tab' => $tab]);
   // }

   public function changeStatus(Request $request){

      $model = $request->model;
      $id = $request->id;
      $tab = $request->tab;

      $itemId = DB::table($model)->find($id);
      ($itemId->status == true) ? $action=$itemId->status = false : $action=$itemId->status = true;     
      DB::table($model)->where('id', $id)->update(['status' => $action]);
      
      return response()->json(['message' => 'Status updated successfully.']);



      // $itemId = DB::table($model)->find($id);
      // ($itemId->status == true) ? $action=$itemId->status = false : $action=$itemId->status = true;     
      // DB::table($model)->where('id', $id)->update(['status' => $action]);
      // return back()->with('success', $model.' status change')->withInput(['tab' => $tab]);

   }

   // Status2 [Required vs not required]
   public function itemStatus2($model, $field, $id, $tab){
      //Much code because save() function not working...
      $itemId = DB::table($model)->find($id);
      ($itemId->$field == true) ? $action=$itemId->$field = false : $action=$itemId->$field = true;     
      DB::table($model)->where('id', $id)->update([$field => $action]);
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
