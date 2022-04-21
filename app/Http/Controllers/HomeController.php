<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
