<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class goods extends Model
{
    protected $table = 'goods';
    
    public function getSidAttribute($value)
    {
    	if($value){
    		return DB::table('goods')->where('id',$value)->value('name');
    	}
    		return "菜单";
    }

    public function getStateAttribute($value){

    	if($value==1){
    		return "启用中";
    	}
    	return "禁用";
    }
}
