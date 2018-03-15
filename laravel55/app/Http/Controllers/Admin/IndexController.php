<?php  
namespace App\Http\Controllers\Admin;
use App\AdminModel\Adminuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
	public function index(){
		 return view('admin.index');
	}
}
?>