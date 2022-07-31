<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {
   protected $guarded = [];

   public function allUser(){
      return $this->belongsToMany(AllUser::class, 'notice_recipient_lists', 'notice_id', 'user_id');
   }

   public function member(){
      return $this->belongsToMany(Member::class, NoticeRecipientList::class, 'notice_id', 'member_id');
   }
}
