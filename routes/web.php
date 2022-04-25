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

   // Notice
   Route::get('/notice/new', 'NoticeController@new')->name('notice.new');
   Route::post('/notice/add', 'NoticeController@add')->name('notice.add');
   Route::get('/notice/all', 'NoticeController@all')->name('notice.all');
   Route::get('viewSingleNotice/{id}/{model}/{tab}','NoticeController@viewSingleNotice')->name('viewSingleNotice');   
   Route::get('editNotice/{id}/{model}/{tab}','NoticeController@editNotice')->name('editNotice');
   Route::post('/notice/edit', 'NoticeController@editNoticeNow')->name('editNoticeNow');

   // File
   Route::get('/file/new', 'FileController@new')->name('file.new');
   Route::post('/file/add', 'FileController@add')->name('file.add');
   Route::get('/file/all', 'FileController@all')->name('file.all');
   Route::get('fileDelete/{id}/{model}/{tab}','FileController@fileDelete')->name('fileDelete');

   // head
   Route::get('/head-parent/new', 'HeadController@new')->name('head.new');
   Route::post('/head/add', 'HeadController@add')->name('head.add');
   Route::get('/head/all', 'HeadController@all')->name('head.all');
   Route::get('headDelete/{id}/{model}/{tab}','HeadController@headDelete')->name('headDelete');
   Route::get('editHead/{id}/{model}/{tab}','HeadController@editHead')->name('editHead');
   Route::post('/head/edit', 'HeadController@editHeadNow')->name('editHeadNow');

   // Settings
   Route::get('/settings', 'SettingController@settings')->name('settings');
   Route::post('/add-custom-field', 'SettingController@addCustomField')->name('addCustomField');
   Route::get('deleteCustomField/{id}/{model}/{tab}','SettingController@deleteCustomField')->name('deleteCustomField');
   Route::post('/add-user-type', 'SettingController@addUserType')->name('addUserType');
   Route::post('/add-head-parent', 'SettingController@addHeadParent')->name('addHeadParent');

   // All status change   
   Route::get('itemStatus/{id}/{model}/{tab}','MemberController@itemStatus')->name('itemStatus');
   Route::get('view/{id}/{model}/{tab}','MemberController@view')->name('view');
   Route::get('itemDelete/{id}/{model}/{tab}','MemberController@itemDelete')->name('itemDelete');
  
});

Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   Artisan::call('route:clear');   
   
   return "Cleared!";
});
