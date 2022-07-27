<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model{
   protected $guarded = [];

   public function member(){
      return $this->hasOne(MemberCategory::class, 'category_id', 'id');
   }
}
