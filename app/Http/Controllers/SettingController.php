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
use App\Models\HeadParent;
use App\Models\RecipientType;
use App\Models\UserType;

class SettingController extends Controller{

   // All settings
   public function settings(){
      $data['customFields'] = CustomField::all();
      $data['userTypes'] = UserType::all();
      $data['recipientTypes'] = RecipientType::all();
      $data['headParents'] = HeadParent::all();
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

   // Delete custom field
   public function deleteCustomField($id, $model, $tab){
      $itemId = DB::table($model)->find($id);
      $table  = 'members';
      $column = $itemId->name;

      // custom_fields
      DB::table($model)->where('id', $id)->delete();
      
      // members
      DB::select("ALTER TABLE $table DROP $column");
      return back()->with('success', 'Column delete successfully')->withInput(['tab' => $tab]);
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

   // Add recipient type 
   public function addRecipientType(Request $request){
      
      $validator = Validator::make($request->all(), [
         'name'=>'required|unique:recipient_types'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $tab = 'recipientType';
      RecipientType::insert(['name' => $request->name]);
      return back()->with('success', 'Recipient type add successfully')->withInput(['tab' => $tab]);      
   }

   // Add head parents 
   public function addHeadParent(Request $request){
      
      $validator = Validator::make($request->all(), [
         'name'=>'required|unique:head_parents'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $tab = 'headParent';
      HeadParent::create(['name' => $request->name]);
      return back()->with('success', 'Head parent add successfully')->withInput(['tab' => $tab]);      
   }
   
}