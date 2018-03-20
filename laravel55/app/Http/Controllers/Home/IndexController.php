<?php

namespace App\Http\Controllers\Home;
use App\AdminModel\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {	
    	// banner
    	$stu = Banner::get();
    	return view('home/index/index',['stu'=>$stu]);
    }

    // //banner
    // public function banner(Request $require)
    // {
    // 	$stu = Banner::get();
    // 	dd($stu);
    // }

}
