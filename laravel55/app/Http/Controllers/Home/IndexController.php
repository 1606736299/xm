<?php

namespace App\Http\Controllers\Home;
use App\AdminModel\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\AdminModel\User;

class IndexController extends Controller
{
    public function index(Request $request)
    {	
    	// banner
    	$homese = session('key');
    	$stu = Banner::get();
    	return view('home/index/index',['stu'=>$stu,'ccc'=>$homese]);
    }

}
