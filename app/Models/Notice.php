<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {
   protected $guarded = [];

   public function allUser(){
      return $this->hasMany(AllUser::class, 'user_id', 'id');
   }

   public function memberCategory(){
      return $this->hasMany(MemberCategory::class, 'member_id', 'id');
   }
}
