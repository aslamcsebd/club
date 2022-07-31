<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use URL;
use Auth;
use Carbon\Carbon;
use App\Models\UserType;
use App\Models\MemberCategory;
use App\Models\File;
use App\Models\FileRecipientList;

class FileController extends Controller{

   // File
   public function new(){
      $data['userTypes'] = UserType::where('status', 1)->get();
      $data['memberTypes'] = MemberCategory::where('status', 1)->get();
      return view('admin.file.add', $data);      
   }

   // Add file
   public function add(Request $request){

      $validator = Validator::make($request->all(),[
         'name'=>'required',
         'file' => 'required|max:10240|mimes:pdf,doc,docx,txt,odt,xls,xlsx,jpeg,jpg,png,pngdoc,docx'
      ]);
      //Maximum file size: 10 MB.

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $path="files/";
      if ($request->hasFile('file')){
         if($files=$request->file('file')){
            $file = $request->file;
            $fullName=time().".".$file->getClientOriginalExtension();
            $files->move(public_path($path), $fullName);
            $fileLink = $path . $fullName;
         }
      }else{
         $fileLink = '';
      }     

      $fileId = File::insertGetId([
         'created_by' => Auth::user()->name,
         'name' => $request->name,
         'file' => $fileLink
      ]);

      //User type list
      $userType_id = $request->input('userType_id');
      if ($userType_id){
         foreach ($userType_id as $id) {
            FileRecipientList::insertGetId([
               'file_id' => $fileId,
               'userType_id' => $id
            ]);
         }
      }      
      
      // Member category list
      $memberCategory_id = $request->input('memberCategory_id');
      if ($memberCategory_id){
         foreach ($memberCategory_id as $id) {
            FileRecipientList::insertGetId([
               'file_id' => $fileId,
               'memberCategory_id' => $id
            ]);
         }
      }
      return back()->with('success','New file upload successfully');
   }

   // Show all file
   public function all(){
      $data['files'] = File::with('userType', 'memberType')->get();
      return view('admin.file.all', $data);
   }

   // delete file
   public function fileDelete($id, $model, $tab){
      $itemId = DB::table($model)->find($id);
      DB::table($model)->where('id', $id)->delete(); 
      (file_exists($itemId->file) ? unlink($itemId->file) : '');
      return back();
   }

}
