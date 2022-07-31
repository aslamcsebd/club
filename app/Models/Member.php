<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {
   protected $guarded = [];

   public function memberCategoryList(){
      return $this->hasMany(MemberCategoryList::class, 'member_id', 'id');
   }

   public function memberCategory(){
      return $this->belongsToMany(MemberCategory::class, 'member_category_lists', 'member_id', 'category_id');
   }
}
