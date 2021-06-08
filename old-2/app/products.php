<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    public function hasOneCategory()
    {
    	return $this->hasOne('App\Category','id','pro_category_id');
    }
}
