<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Member;
use App\Models\MemberCategory;
use App\Models\CustomField;
use App\Models\UserType;


class HomeController extends Controller{
    
   public function __construct(){
      $this->middleware('auth');
   }
  
   public function index(){
      $data['member'] = Member::all();      
      $data['memberCategory'] = MemberCategory::all();      
      $data['customField'] = CustomField::all();      
      $data['userType'] = UserType::all();      
      return view('home', $data);
   }


   public function refreshStatus($value){
      $dbInfo = DB::table('refresh_status')->first();
      if ($value=='status'){
         $refreshStatus = $dbInfo->status;
         ($refreshStatus==1) ? $changeValue=false : $changeValue=true;         
         $field = 'status';

      }elseif($value=='decrease' || $value=='increase'){
         $time = $dbInfo->time;         
         ($value=='decrease') ? $changeValue=$time-1 : $changeValue=$time+1;        
         $field = 'time';
      }      
      DB::table('refresh_status')->update([$field => $changeValue]);
      return back();
   }
}
