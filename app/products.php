<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class products extends Model
{
    //protected $dates = ['published_at'];

    public function setPronameenAttribute($value)
    {
        $this->attributes['pronameen'] = $value;

        //if (! $this->exists) {
            $this->attributes['slug'] =Str::slug($value, '-');
        //}
    }

    public function hasOneCategory()
    {
    	return $this->hasOne('App\Category','id','pro_category_id');
    }
}
