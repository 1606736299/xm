<?php

namespace App\Http\Controllers\Admin;
use App\AdminModel\Adminuser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\Hash;
class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $stu = Adminuser::orderBy('id', 'desc')->get();
        return view('admin.adminuser', ['stu' => $stu]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加
    public function store(Request $request)
    {
        //执行图片添加
        $file = $request->file('imaged');

        //获取随机名
         $newImagesName = mt_rand(1000,99999);

         //获取时间戳
         $time = time();

         //拼接文件名
         $novel = $newImagesName.$time;

         //获取文件的后缀
         $extension = $file->getClientOriginalExtension();

         //定义文件目录
        $site = 'uploads/';

         //缩放后前缀名
        $pre="x_";

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

        $password = md5($request->password);

        $Adminuser = new Adminuser;

        //执行数据添加
        
        $Adminuser->imaged = $novel.'.'.$extension;
        $Adminuser->imagex = $pre.$novel.'.'.$extension;
        $Adminuser->name = $request->name;
        $Adminuser->sex = $request->sex;
        $Adminuser->username = $request->username;
        $Adminuser->password = $password;
        $Adminuser->state = $request->state;
        $Adminuser->save();

        return redirect()->action('Admin\AdminuserController@index');     
    }
        
        
       

       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
       $ste =  Adminuser::find($request->id);
       return $ste->password;
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //修改

        //获取修改的图片信息
         $file = $request->file("imaged");

         $id = $request->id;//id

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
            $Find->state = $request->state;
            $Find->save();
            return "<img src='/uploads/".$pre.$novel.'.'.$extension."'>";//返回数据
        }else{
            $Find->name = $request->name;
            $Find->sex = $request->sex;
            $Find->state = $request->state;
            $Find->save();
            $Fi = Adminuser::find($id);
            return "<img src='/uploads/$Fi->imagex'>";//返回数据
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //删除
        $id = $request->id;//获取id

        $tmpArr = explode(',', $id);//把字符串拆分成数据

        //遍历数据
        for($i=0;$i<count($tmpArr);$i++){
            //查询每个id
            $Adminuser = Adminuser::find($tmpArr[$i]);

            //定义图片路径
            $file = "uploads/";

            //查询原图片
            $ximage =  $Adminuser->imagex;
            $dimage =  $Adminuser->imaged;

            //拼装原图路径
            $one = $file.$ximage;
            $two= $file.$dimage;

            //删除数据库每条信息
            $m = Adminuser::destroy($tmpArr[$i]);
             if($m){
                 //判断删除图片
                if(file_exists($one)){
                      unlink($one);
                }
                if(file_exists($two)){
                    unlink($two);
                }
             }
        }
    }
}
