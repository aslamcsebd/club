<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {
   protected $guarded = [];

   public function userType(){
      return $this->belongsToMany(UserType::class, NoticeRecipientList::class, 'notice_id', 'userType_id');
   }

   public function memberType(){
      return $this->belongsToMany(MemberCategory::class, NoticeRecipientList::class, 'notice_id', 'memberCategory_id');
   }
}
