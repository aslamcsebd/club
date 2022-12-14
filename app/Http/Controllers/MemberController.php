<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

use Validator;
use Redirect;
use DB;
use Carbon\Carbon;

use App\Models\Member;
use App\Models\MemberCategory;
use App\Models\MemberCategoryList;
use App\Models\CustomField;
use App\Models\UserType;

class MemberController extends Controller{

   // Member registration
   public function new(){
      $data['customFields'] = CustomField::where('type', '!=', null)->where('status', 1)->get();
      $data['memberCategory'] = MemberCategory::where('status', 1)->get();
      return view('admin.member.registration', $data);
   }

   //Auto complete respons
   public function memberList(Request $request){
      // dd(request()->all());
      if($request->has('term')){
         $obj = Member::where('mobile', $request->input('term'))->first();
         return response()->json(['message' =>  $obj]);
      }
   }

   // Status change
   public function disable(Request $request){
      $id = $request->id;
      $obj = Member::with('memberCategoryList.memberCategory')->find($id);
      // $obj = Member::with('memberCategory')->find($id);         
      return response()->json(['message' =>  $obj]);
   }

   // Registration Applications from online
   public function member_form(Request $request){
      $data['customFields'] = CustomField::where('type', '!=', null)->where('status', 1)->get();
      $data['memberCategory'] = MemberCategory::where('status', 1)->get();
      return view('admin.member.online-registration', $data);  
   }

   // Add new member
   public function addMember(Request $request){
      
      if(request('id')==null){         
         $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:members',
            'password'=>'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
            'mobile'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'member_no'=>'required|unique:members'
         ]);
   
         if($validator->fails()){
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
         }
   
         $path="images/member/";
         $default="default.jpg";
         if ($request->hasFile('photo')){
            if($files=$request->file('photo')){
               $photo = $request->photo;
               $fullName=time().".".$photo->getClientOriginalExtension();
               $files->move(public_path($path), $fullName);
               $photoLink = $path. $fullName;
            }
         }else{
            $photoLink = $path . $default;
         }
   
         if($request->has('member_add_from')){
            $member_add_from = $request->member_add_from;   //Online
         }else{         
            $member_add_from = 'By_admin';
         }
   
         $insertId = DB::table('members')->insertGetId([
            'member_no' => $request->member_no,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
            'address' => $request->address,
            'gender' => $request->gender,
            'blood' => $request->blood,
            'dob' => date('Y-m-d', strtotime($request->dob)),
            'photo' => $photoLink,
            'member_add_from' => $member_add_from
         ]);
   
         $insertId2 = MemberCategoryList::insert([
            'member_id' => $insertId,
            'category_id' => $request->category_id
         ]);
         
         $customFields = CustomField::where('type', '!=', null)->where('status', 1)->get();
       
         foreach ($customFields as $field) {
            $title = $field->name;
            DB::table('members')->where('id', $insertId)->update([
               $title => $request->$title
            ]);
         }

      }else{
         // dd('old member');
         MemberCategoryList::insert([
            'member_id' => $request->id,
            'category_id' => $request->category_id
         ]);
      }

      return back()->with('success','New member add successfully');
   }

   // Show all member
   public function online(){
      $data['members'] = Member::where('member_add_from', 'Online')->orderBy('id', 'DESC')->get();
      return view('admin.member.members', $data);
   }
   
   // Show all member
   public function all(){
      $data['members'] = Member::orderBy('id', 'DESC')->get();
      return view('admin.member.members', $data);
   }

   // Show single member
   public function view($id, $model, $tab){
      $data['single'] =  $itemId = DB::table($model)->find($id);
      $data['customFields'] = CustomField::where('status', 1)->get();

      $allColumns = array_keys(json_decode(Member::first(), true));
      $data['needed_columns'] = array_diff($allColumns, ['id', 'password', 'photo', 'status', 'created_at', 'updated_at']);
      
      return view('admin.user.view', $data);
   }

   // Status2 [Required vs not required]
   public function itemStatus2($model, $field, $id, $tab){
      //Much code because save() function not working...
      $itemId = DB::table($model)->find($id);
      ($itemId->$field == true) ? $action=$itemId->$field = false : $action=$itemId->$field = true;     
      DB::table($model)->where('id', $id)->update([$field => $action]);
      return back()->with('success', $model.' status change')->withInput(['tab' => $tab]);
   }
   
}
