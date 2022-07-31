<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model{
   protected $guarded = [];

   public function member(){
      return $this->belongsToMany(Member::class, MemberCategoryList::class, 'member_id', 'category_id');
   }
}
