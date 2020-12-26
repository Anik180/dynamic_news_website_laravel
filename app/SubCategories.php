<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    public function categories()
{
    return $this->belongsTo('App\Categories','id');
}
}
