<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllUser extends Model{
   protected $guarded = [];

   public function userType(){
      return $this->belongsTo(UserType::class, 'user_type_id', 'id')->withDefault();
   }   
}
