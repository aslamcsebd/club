<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use DB;
use App\Models\Member;
use App\Models\MemberCategory;
use App\Models\CustomField;
use App\Models\UserType;
use App\Models\File;
use App\Models\HeadInfo;

class HomeController extends Controller{
    
   // public function __construct(){ $this->middleware('auth'); }
  
   public function index(){
      $data['member'] = Member::all();      
      $data['memberCategory'] = MemberCategory::all();      
      $data['customField'] = CustomField::all();      
      $data['userType'] = UserType::all();      
      $data['files'] = File::all();      
      $data['headInfos'] = HeadInfo::all();      
      return view('home', $data);
   }

   // Status change
   public function changeStatus(Request $request){
      $model = $request->model;
      $field = $request->field;
      $id = $request->id;
      $tab = $request->tab;

      $itemId = DB::table($model)->find($id);
      ($itemId->$field == true) ? $action=$itemId->$field = false : $action=$itemId->$field = true;     
      DB::table($model)->where('id', $id)->update([$field => $action]);
      return response()->json(['message' => 'Status updated successfully.']);
   }

   // Delete
   public function itemDelete($model, $id, $tab){
      $itemId = DB::table($model)->find($id);
      if (Schema::hasColumn($model, 'image')){
         ($itemId->image!=null) ? (file_exists($itemId->image) ? unlink($itemId->image) : '') : '';
      }
      DB::table($model)->where('id', $id)->delete();
      return back()->with('success', $model.' delete successfully')->withInput(['tab' => $tab]);
   }
}
