<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\HomeModel\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
	//注册页面
    public function index()
    {
    	return view('home.register.index');
    }

    //注册行为
    public function register(Request $resquest)
    {
    	//验证
    	$this->validate(request(),[
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|confirmed',
        ]);

    	//逻辑
    	User::create(request(['name','email','password']));

    	//渲染
    	return redirect('/login');
    }
}
