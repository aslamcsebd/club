<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::middleware(['auth'])->group(function(){
   Route::get('/', 'HomeController@index')->name('home');

   // Registration member
      Route::get('/registation/new', 'MemberController@new')->name('member.new');
      Route::post('/add-new-member', 'MemberController@addMember')->name('addMember');
      Route::get('/member/all', 'MemberController@all')->name('member.all');  
      Route::get('/member/online', 'MemberController@online')->name('member.online');  

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

   // Head
      Route::get('/head-parent/new', 'HeadController@new')->name('head.new');
      Route::post('/head/add', 'HeadController@add')->name('head.add');
      Route::get('/head/all', 'HeadController@all')->name('head.all');
      Route::get('headDelete/{id}/{model}/{tab}','HeadController@headDelete')->name('headDelete');
      Route::get('editHead/{id}/{model}/{tab}','HeadController@editHead')->name('editHead');
      Route::post('/head/edit', 'HeadController@editHeadNow')->name('editHeadNow');

   // All user
      Route::get('/user/new', 'UserController@new')->name('user.new');
      Route::post('/user/add', 'UserController@addUser')->name('addUser');
      Route::get('/user/all', 'UserController@all')->name('user.all');   
      Route::get('/user/get/{name}', 'UserController@all')->name('user.get');   
      Route::get('userView/{id}/{model}/{tab}','UserController@userView')->name('userView');

      Route::get('userDelete/{id}/{model}/{tab}','UserController@userDelete')->name('userDelete');
      Route::get('editUser/{id}/{model}/{tab}','UserController@editUser')->name('editUser');

   // Settings
      Route::get('/settings', 'SettingController@settings')->name('settings');

      Route::post('/add-category', 'SettingController@addCategory')->name('addCategory');
      Route::get('deleteCustomField/{id}/{model}/{tab}','SettingController@deleteCustomField')->name('deleteCustomField');

      Route::post('/add-custom-field', 'SettingController@addCustomField')->name('addCustomField');

      Route::post('/add-user-type', 'SettingController@addUserType')->name('addUserType');

      Route::post('/add-head-parent', 'SettingController@addHeadParent')->name('addHeadParent');

      Route::post('/add-general', 'SettingController@addGeneral')->name('addGeneral');

   // All status change   
      // Route::get('itemStatus/{id}/{model}/{tab}','MemberController@itemStatus')->name('itemStatus');
      Route::get('/status/update', 'MemberController@changeStatus')->name('status');
      
      Route::get('itemStatus2/{model}/{field}/{id}/{tab}','MemberController@itemStatus2')->name('itemStatus2');
      Route::get('view/{id}/{model}/{tab}','MemberController@view')->name('view');
      Route::get('itemDelete/{id}/{model}/{tab}','MemberController@itemDelete')->name('itemDelete');  

});

// Registration Applications
Route::get('/member-register', 'MemberController@member_form')->name('member_form');
Route::post('/add-new-member', 'MemberController@addMember')->name('addMember');

Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   Artisan::call('route:clear');
   
   return "Cleared!";
});
