<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class UserController extends Controller
{
    //
    public function index(){
    	//查询数据
    	 $stu = User::orderBy('id', 'desc')->get();
        return view('admin.user', ['stu' => $stu]);
    }

    //修改状态
    public function state($id){
    	// var_dump(1);dd();
    	$state = User::find($id);

    	if($state->state=="0"){
    		$state->state="1";
    	}else{
    		$state->state="0";
    	}
    	$state->save();
    	return redirect()->action('Admin\UserController@index');
    }
}
