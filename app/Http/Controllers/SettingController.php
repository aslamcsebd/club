<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Validator;
use Redirect;
use DB;
use Carbon\Carbon;

use App\Models\MemberCategory;
use App\Models\CustomField;
use App\Models\UserType;

class SettingController extends Controller{

   // Add custom field
   public function settings(){
      $data['customFields'] = CustomField::all();
      $data['userTypes'] = UserType::all();
      return view('admin.settings', $data);      
   }

   // Add Custom Field 
   public function addCustomField(Request $request){
      
      $data = $request->all();
      $data['name'] = preg_replace("/\s+/", "_", request('name'));
      
      $validator = Validator::make($data, [
         'name'=>'required|unique:custom_fields'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $table  = 'members';
      $column = $data['name'];
      $addColumn = DB::select("ALTER TABLE $table ADD $column VARCHAR(255) after status");
      $tab = 'addCustomField';

      if ($addColumn > 0) {
         CustomField::insert(['name' => $column]);
      }else{
         return back()->with('fail', 'Column add fail')->withInput(['tab' => $tab]);
      }      
      return back()->with('success', 'Column add successfully')->withInput(['tab' => $tab]);      
   }

   // Add user type 
   public function addUserType(Request $request){
      
      $validator = Validator::make($request->all(), [
         'name'=>'required|unique:user_types'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $tab = 'userType';
      UserType::insert(['name' => $request->name]);
      return back()->with('success', 'User type add successfully')->withInput(['tab' => $tab]);      
   }
   
}