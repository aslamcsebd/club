<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model{
   protected $guarded = [];

   public function userType(){
      return $this->belongsToMany(UserType::class, FileRecipientList::class, 'file_id', 'userType_id');
   }

   public function memberType(){
      return $this->belongsToMany(MemberCategory::class, FileRecipientList::class, 'file_id', 'memberCategory_id');
   }
}
