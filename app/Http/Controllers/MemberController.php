<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use Redirect;
use DB;
use Carbon\Carbon;

use App\Models\MemberCategory;

class MemberController extends Controller{

   // Member registration
   public function new(){
      return view('admin.member.registration');
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
         'date'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $path="photo/";
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

      DB::table('members')->insert([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'mobile' => $request->mobile,
         'address' => $request->address,
         'gender' => $request->gender,
         'date' => $request->date,
         'photo' => $photoLink
     ]);
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
      return view('admin.member.view', $data);
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
