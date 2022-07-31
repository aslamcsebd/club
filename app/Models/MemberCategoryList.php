<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCategoryList extends Model {
   protected $guarded = [];
   
   public function memberCategory(){
      return $this->belongsTo(MemberCategory::class, 'category_id', 'id')->withDefault();
   }
   
}
