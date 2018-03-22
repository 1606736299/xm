<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Comment extends Model
{
    //
    protected $table = 'comment';
    
    public function getGidAttribute($v){
    	return Db::table('goods')->find($v)->name;
    }

    public function getUidAttribute($v){
    	return Db::table('user')->find($v)->name;
    }

    public function getStateAttribute($v){

    	if($v==1){
    		return "允许显示";
    	}
    	return "禁止显示";
    }

    public function getReplyAttribute($v){

    	if($v>0){
    		return "已回复";
    	}
    	return "未回复";
    }
}
