<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use DB;
use URL;
use Carbon\Carbon;
use App\Models\UserType;
use App\Models\MemberCategory;
use App\Models\File;

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
         'recipient_type'=>'required',
         'file' => 'required|max:10240|mimes:pdf,doc,docx,txt,odt,xls,xlsx,jpeg,jpg,pngdoc,docx'
      ]);
      //Maximum file size: 10 MB.

      if($validator->fails()){
         $messages = $validator->messages();
         return Redirect::back()->withErrors($validator);
      }

      $path="";
      if ($request->hasFile('file')){
         if($files=$request->file('file')){
            $file = $request->file;
            $fullName=time().".".$file->getClientOriginalExtension();
            $files->move(filePath($path), $fullName);
            $fileLink = filePath($path). $fullName;
         }
      }else{
         $fileLink = '';
      }

      File::create([
         'name' => $request->name,
         'recipient_type' => $request->recipient_type,
         'file' => $fileLink
      ]);
      return back()->with('success','New file upload successfully');
   }

   // Show all file
   public function all(){
      $data['files'] = File::all();
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
