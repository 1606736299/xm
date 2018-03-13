<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	return view('home/index/index');
    }

}
