<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsInfo extends Model
{
    //
    protected $table = 'goods_size';
    
	public function getStateAttribute($value){

		if($value==1){
			return "启用中";
		}
		return "禁用";
    }

    public function getPriceAttribute($value){

		return "￥".$value.".00";
    }

    public function getNumberAttribute($value){

		return $value."件";
    }

    public function setPriceAttribute($value){
    	 return ltrim(rtrim($value, ".00"),"￥");
    }

    public function setNumberAttribute($value){

		return rtrim($value,"件");
    }
}
