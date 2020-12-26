<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    
  // protected $fillable = [
  //       'category_bn', 'category_en', 'soft_delete',
  //   ];


     public function subcategories()
    {
        return $this->hasMany('App\SubCategories','category_id');
    }
}
