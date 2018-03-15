<?php
namespace App\Http\Controllers\Admin;
use App\AdminModel\Adminuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{

	public function index(Request $request){
		$stu = Adminuser::get();
		foreach ($stu as $key) {
			if($request->username==$key->username && md5($request->password)==$key->password){

				session(['key'=>$request->username]);

				return "登陆成功";
			}
		}
		return "用户名或密码有误，请重新输入或<a href='#' style='color:#2e82fff'>找回密码</a>";
	}
}

?>