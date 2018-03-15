<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//登陆页面
Route::get('/admin', function () {
	return view('admin.login');
});
Route::post('/admin/login','Admin\LoginController@index');

Route::group(['middleware' => 'adminlogin'],function(){
	//后台首页
	Route::any('/admin/index','Admin\IndexController@index');
	//后台会员管理资源控制器
	Route::resource('/admin/adminuser', 'Admin\AdminuserController');
	//banner资源控制器
	Route::resource('/admin/banner', 'Admin\BannerController');
	//前台会员控制器
	Route::any('/admin/user','Admin\UserController@index');
	Route::any('/admin/user/state/{id}','Admin\UserController@state');//修改状态
}); 


































































































// -----------------首页------------------//
//用户模块
//注册页面
Route::get('/register', 'Home\RegisterController@index');
//注册行为
Route::post('/register', 'Home\RegisterController@register');
//登录页面
Route::get('/login', 'Home\LoginController@index');
//登陆行为
Route::post('/login', 'Home\LoginController@login');
//登出行为
Route::get('/logout', 'Home\LoginController@logout');

Route::get('/', function(){
	return view('home.index.index');
});
Route::get('/online', function(){
	return view('home.online.index');
});
Route::get('/building', function(){
	return view('home.building.index');
});
Route::get('/hairdressing', function(){
	return view('home.hairdressing.index');
});
Route::get('/housekeeping', function(){
	return view('home.housekeeping.index');
});