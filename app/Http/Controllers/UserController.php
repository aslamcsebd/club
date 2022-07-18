<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

use Validator;
use Redirect;
use DB;
use Carbon\Carbon;

use App\Models\UserType;
use App\Models\AllUser;

class UserController extends Controller{

   // Member registration
   public function new(){
      $data['user_types'] = UserType::where('status', 1)->get();
      return view('admin.user.add', $data);  
   }

   // Add new user
   public function addUser(Request $request){
      
      $validator = Validator::make($request->all(),[
         'user_type'=>'required',
         'name'=>'required',
         'email'=>'required|unique:users',
         'mobile'=>'required',
         'password'=>'required|min:6',
         'confirm_password' => 'required|same:password|min:6',
         'address'=>'required',
         'gender'=>'required',
         'dob'=>'required',
         'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $path="user/";
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

      AllUser::create([
         'user_type' => $request->user_type,
         'name' => $request->name,
         'email' => $request->email,
         'mobile' => $request->mobile,
         'password' => Hash::make($request->password),
         'address' => $request->address,
         'gender' => $request->gender,
         'blood' => $request->blood,
         'dob' => date('Y-m-d', strtotime($request->dob)),
         'photo' => $photoLink
      ]);
      return back()->with('success','New user add successfully');
   }

   // Show all/group user
   public function all(){
      $data['userCategory'] = AllUser::get()->groupBy('user_type');

      $user_type = request('name');
      $data['users'] = AllUser::when($user_type, function($query) use ($user_type){
         return $query->where('user_type', $user_type);
      })->get()->groupBy('user_type');

      return view('admin.user.all', $data);
   }

   // Show single user
   public function userView($id, $model, $tab){
      $data['single'] =  $itemId = DB::table($model)->find($id);
      $allColumns = array_keys(json_decode(AllUser::first(), true));
      $data['needed_columns'] = array_diff($allColumns, ['id', 'password', 'photo', 'status', 'created_at', 'updated_at']);
      return view('admin.user.view', $data);
   }

   // Member category
   public function category(){
      $data['categories'] = MemberCategory::all();
      return view('admin.member.category', $data);
   }

   // Add user category
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
