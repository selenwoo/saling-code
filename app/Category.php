<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;//DB 门面
use Illuminate\Support\Str;//字符串辅助函数

class Category extends Model
{
    public function childCategory()
    {
    	return $this->hasMany('App\Category','category_parent_id','id');
    }

    public function allChildrenCategorys()
    {
    	return $this->childCategory()->with('allChildrenCategorys');
    }

    


    public static function showType(){
    	$info = DB::table('categories')->get();
    	$result = self::list_level($info,$pid=0,$level=0);
    	return $result;
    }

	/**
	*书写一个调用无线分类的方法
	*@param $level 分类级别
	*@param $pid 父级id
	*@param $data 所有分类
	*/
	public static function list_level($data,$pid,$level){
		static $array = array();
		foreach ($data as $k => $v) {			
			if($pid == $v->category_parent_id){
				$v->level = $level;
				$array[] = $v;
				self::list_level($data,$v->id,$level+1);
			}
		}
		return $array;
	}

	public function setCategorynameenAttribute($value)
    {
        $this->attributes['categorynameen'] = $value;

        //if (! $this->exists) {
            $this->attributes['slug'] =Str::slug($value, '-');//更新是将英文名称（空格加-）赋给slug，形成利于seo的URL
        //}
    }


}
