<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Redirect;
use DB;
use Auth;
use Carbon\Carbon;

use App\Models\UserType;
use App\Models\MemberCategory;
use App\Models\Notice;

class NoticeController extends Controller{

   // Notice
   public function new(){
      $data['userTypes'] = UserType::where('status', 1)->get();
      $data['memberTypes'] = MemberCategory::where('status', 1)->get();
      return view('admin.notice.add', $data);      
   }

   // Add notice
   public function add(Request $request){

      $validator = Validator::make($request->all(),[
         'title'=>'required',
         'user_type'=>'required',
         'member_type'=>'required',
         'description'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      Notice::create([
         'created_by' => Auth::user()->name,
         'title' => $request->title,
         'description' => $request->description,
         'user_type' => $request->user_type,
         'member_type' => $request->member_type,
      ]);
      return back()->with('success','New notice add successfully');
   }

   // Show all notice
   public function all(){
      $data['notices'] = Notice::all();
      return view('admin.notice.all', $data);
   }

   // Show single notice
   public function viewSingleNotice($id, $model, $tab){
      $data['single'] =  $itemId = DB::table($model)->find($id);   
      return view('admin.notice.view', $data);
   }

   // Edit single notice
   public function editNotice($id, $model, $tab){
      $data['single'] =  $itemId = DB::table($model)->find($id); 
      $data['userTypes'] = UserType::where('status', 1)->get();
      $data['memberTypes'] = MemberCategory::where('status', 1)->get();   
      return view('admin.notice.edit', $data);
   }

   // Edit single notice
   public function editNoticeNow(Request $request){
      $validator = Validator::make($request->all(),[
         'title'=>'required',
         'user_type'=>'required',
         'member_type'=>'required',
         'description'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages(); 
         return Redirect::back()->withErrors($validator);
      }
      
      Notice::where('id', $request->id)->update([
         'title' => $request->title,
         'user_type' => $request->user_type,
         'member_type' => $request->member_type,
         'description' => $request->description
      ]);
      return back()->with('success','Notice edit successfully');
   }
  
}
