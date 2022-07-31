<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllUser extends Model{
   protected $guarded = []; 

   public function notice(){
      return $this->belongsToMany(Notice::class, 'notice_recipient_lists', 'notice_id', 'user_id');
   }


}
