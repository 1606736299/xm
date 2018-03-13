<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登陆页面
    public function index()
    {
    	return view('home.login.index');
    }

    //登陆行为
    public function login()
    {
    	//验证
    	$this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);
    	//逻辑
    	$user = request(['email','password']);
    	if(\Auth::attempt($user)){
    		return redirect('/');
    	}
    	//渲染
    	return \Redirect::back()->withErrors("邮箱密码不匹配");
    }

    //登出行为
    public function logout()
    {

    }
}
