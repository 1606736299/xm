<?php

namespace App\Http\Controllers\Admin;
use App\AdminModel\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //show table status like 'banner';
        $stu = Banner::orderBy('id', 'desc')->get();
        // $stu = Banner::get();
        // dd($stu);
        // $ss = 0;
        // // dd($ss);
        //  foreach ($stu as $key) {
        //     if($key->id>$ss){
        //         $ss = $key->id;
        //     }
        //  }
        //  dd($ss);
        // dd($stu[banner][id]);
        //  dd($key->id);
        // dd($stu->id);
        // $id = $this->id;
        // $Banner =  new Banner();
        // dd($Banner->id);
       // dd(DB::insertGetId());
        // echo mysql_insert_id();
        return view('admin.banner', ['stu' => $stu]);
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
    public function store(Request $request)
    {
        //
        // var_dump(111);
        // $id = $request->id;
        //执行图片添加
      // dd(1);

        $file = $request->file('imaged');
        // dd($file);
       //获取随机名
         $newImagesName = mt_rand(1000,99999);
         //获取时间戳
         $time = time();
         //拼接文件名
         $novel = $newImagesName.$time;
         //获取文件的后缀
         $extension = $file->getClientOriginalExtension();
         //定义文件目录
        $site = 'banner/';
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

        $Banner = new Banner;
        // dd($Adminuser);
        //执行数据添加

         $Banner->imaged = $novel.'.'.$extension;
         $Banner->imagex = $pre.$novel.'.'.$extension;
         $Banner->state = $request->state;
        $Banner->name = $request->name;
        $Banner->save();
        return redirect()->action('Admin\BannerController@index');
         // $users = DB::select("show table status like 'banner'");
         // $ss = session(['key' => $users]);
         // echo($ss);dd();
         // var_dump($users);dd();
       // return "<img src='/banner/".$pre.$novel.'.'.$extension."'>";//返回数据
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
           //修改
        //获取修改的图片信息
         $file = $request->file("imaged");
         // var_dump($file);dd();
         $id = $request->id;//id
        $Find = Banner::find($id);//查询这条信息
        //获取随机名
         $newImagesName = mt_rand(1000,99999);
         //获取时间戳
         $time = time();
         //拼接文件名
         $novel = $newImagesName.$time;
         //获取文件的后缀
         $extension = $file->getClientOriginalExtension();
         //定义文件目录
        $site = 'banner/';
         //缩放后前缀名
          $pre="x_";
         if($file){
             // 把原图删掉
                 $ximage =  $Find->imagex;
                $dimage =  $Find->imaged;
                // var_dump($dimage);
                $one = $site.$ximage;
                $two= $site.$dimage;
                 //判断删除图片
                if(file_exists($two) || file_exists($one)){
                    unlink($one);
                    unlink($two);
                }
                 // var_dump(1);dd();
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

                // //把信息修改
                $Find->imaged = $novel.'.'.$extension;
                $Find->imagex = $pre.$novel.'.'.$extension;
                $Find ->name = $request->name;
                $Find->state = $request->state;
                // var_dump($request->state);dd();
                $Find->save();
                 // var_dump(1);dd();
                return "<img src='/banner/".$pre.$novel.'.'.$extension."'>";//返回数据
           }else{
                // var_dump(1);dd();
                $Find ->name = $request->name;
                $Find->state = $request->state;
                $Find->save();
                $Fi = Banner::find($id);
                return "<img src='/banner/$Fi->imagex'>";//返回数据

         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
