<?php

use Illuminate\Support\Facades\Route;

// Page refresh status
   Route::get('/refreshStatus/{value}', 'HomeController@refreshStatus')->name('refreshStatus');

Auth::routes();
Route::middleware(['auth'])->group(function(){
   Route::get('/', 'HomeController@index');

   // Registration member
   Route::get('/registation/new', 'MemberController@new')->name('member.new');
   Route::post('/add-new-member', 'MemberController@addMember')->name('addMember');
   Route::get('/member/all', 'MemberController@all')->name('member.all');


   // Member category
   Route::get('/member/category', 'MemberController@category')->name('category');
   Route::post('/add-category', 'MemberController@addCategory')->name('addCategory');


   // All status change   
   Route::get('itemStatus/{id}/{model}/{tab}','MemberController@itemStatus')->name('itemStatus');
   Route::get('view/{id}/{model}/{tab}','MemberController@view')->name('view');
   Route::get('itemDelete/{id}/{model}/{tab}','MemberController@itemDelete')->name('itemDelete');
  
});
