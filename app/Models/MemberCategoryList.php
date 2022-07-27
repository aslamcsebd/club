<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberCategoryList extends Model {

   public function memberCategory(){
      return $this->belongsTo(MemberCategory::class, 'category_id', 'id')->withDefault();
   }
   
}
