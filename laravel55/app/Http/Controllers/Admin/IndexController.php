<?php  
namespace App\Http\Controllers\Admin;
use App\AdminModel\Adminuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Image;

class IndexController extends Controller
{
	public function index(){

		$sess = session('key');

		$ccc = Adminuser::where('username',$sess)->get();

		 return view('admin.index',['ccc'=>$ccc]);
	}

	//执行修改
	public function update(Request $request){
		//修改

        //获取修改的图片信息
         $file = $request->file("imaged");

         $id = $request->id;//获取id

        $Find = Adminuser::find($id);//查询这条信息

        //获取随机名
         $newImagesName = mt_rand(1000,99999);

         //获取时间戳
         $time = time();

         //拼接文件名
         $novel = $newImagesName.$time;
       
         //定义文件目录
        $site = 'uploads/';

         //缩放后前缀名
        $pre="x_";

        if($file){
            //获取文件的后缀
            $extension = $file->getClientOriginalExtension();

            // 把原图删掉
            $ximage =  $Find->imagex;
            $dimage =  $Find->imaged;
            $one = $site.$ximage;
            $two= $site.$dimage;
             //判断删除图片
            if(file_exists($two) || file_exists($one)){
                unlink($one);
                unlink($two);
            }
            
             $img = Image::make($file);
             //原图保存到指定位置
             $img->save($site.$novel.'.'.$extension);

             //执行缩放
             $img->resize(null, 60, function($constraint){       // 阻止可能的尺寸变化(保持图像大小)  
                $constraint->aspectRatio();  
                $constraint->upsize();  
            });

            //缩放图保存到指定位置
            $img->save($site. $pre.$novel.'.'.$extension);  

            //把信息修改
            $Find->imaged = $novel.'.'.$extension;
            $Find->imagex = $pre.$novel.'.'.$extension;
            $Find ->name = $request->name;
            $Find->sex = $request->sex;
            $Find->password = md5($request->password);
            $Find->save();
            return redirect()->action('Admin\IndexController@index');
        }else{
            $Find->name = $request->name;
            $Find->sex = $request->sex;
            $Find->password = md5($request->password);
            $Find->save();
            return redirect()->action('Admin\IndexController@index');
        }
	}

	//执行退出清楚session
	public function exit(Request $request){

		$request->session()->forget('key');//清楚session

		return redirect()->route('login');
	}
}
?>