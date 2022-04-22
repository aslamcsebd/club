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

class SettingController extends Controller{

   // Add custom field
   public function settings(){
      $data['customFields'] = CustomField::all();
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
         return back()->with('Column add fail')->withInput(['tab' => $tab]);
      }      
      return back()->with('Column add successfully')->withInput(['tab' => $tab]);      
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
