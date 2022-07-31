<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeRecipientList extends Model {
    protected $guarded = [];

    public function allUser(){
        return $this->belongsTo(AllUser::class, 'user_id', 'id')->withDefault();
    }
}
