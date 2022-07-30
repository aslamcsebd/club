<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model{
   protected $guarded = [];

   public function member(){
      return $this->hasMany(MemberCategoryList::class, 'category_id', 'id');
   }
}
