<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeRecipientList extends Model {
   protected $guarded = [];

    public function allUser(){
        return $this->belongsTo(Member::class, 'user_id', 'id')->withDefault();
    }

    public function memberCategory(){
        return $this->belongsTo(Member::class, 'member_id', 'id')->withDefault();
    }     
}
