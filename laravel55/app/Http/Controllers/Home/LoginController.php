<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\User;

class LoginController extends Controller
{
    private $rules = [
        'captcha' => 'required|captcha'
    ];
    private $messages = [
        'captcha.captcha' => '验证码错误'
    ];   
    //登陆页面
    public function index()
    {
    	return view('home.login.index');
    }

    //登陆行为
    public function login(Request $request)
    {   
    $this->Validate($request,$this->rules,$this->messages);
    $stu = User::get();
   foreach ($stu as $key) {
      if($key->username==$request->username && $key->password==$request->password){
          session(['key'=>$request->username]);
          return "登陆成功";
      }else{
          return "用户名或密码错误";
      }
   }
}

    //退处行为
    public function logout(Request $request)
    {
        $request->session()->forget('key');//清楚session

        return redirect()->route('index');
    }

}
