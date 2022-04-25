<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Redirect;
use DB;
use Carbon\Carbon;

use App\Models\UserType;
use App\Models\HeadParent;
use App\Models\HeadInfo;

class HeadController extends Controller{

   // Head
   public function new(){
      $data['headParents'] = HeadParent::where('status', 1)->get();
      return view('admin.head.add', $data);      
   }

   // Add head
   public function add(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'head_type'=>'required',
         'parent_head'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      ($request->filled('material') ? $material=$request->material : $material='No');
      ($request->filled('gift') ? $gift=$request->gift : $gift='No');

      HeadInfo::create([
         'name' => $request->name,
         'head_type' => $request->head_type,
         'material' => $material,
         'gift' => $gift,
         'parent_head' => $request->parent_head
      ]);
      return back()->with('success','Head notice add successfully');
   }

   // Show all head
   public function all(){
      $data['headInfos'] = HeadInfo::all();
      return view('admin.head.all', $data);
   }   

   // Edit single head
   public function editHead($id, $model, $tab){
      $data['single'] = DB::table($model)->find($id);
      $data['headParents'] = HeadParent::where('status', 1)->get();            
      return view('admin.head.edit', $data);
   }

   // Edit single head
   public function editHeadNow(Request $request){
      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'head_type'=>'required',
         'parent_head'=>'required'
      ]);

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      ($request->filled('material') ? $material=$request->material : $material='No');
      ($request->filled('gift') ? $gift=$request->gift : $gift='No');

      HeadInfo::where('id', $request->id)->update([
         'name' => $request->name,
         'head_type' => $request->head_type,
         'material' => $material,
         'gift' => $gift,
         'parent_head' => $request->parent_head
      ]);
      return back()->with('success','Head edit successfully');
   }
  
}


