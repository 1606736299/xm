<?php

namespace App\Http\Controllers\Admin;

use App\GoodsInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;

class GoodsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载添加页面
    public function index()
    {
        //
        // return 1;
        
        
        $data = $this->list();
        return view('admin.goods.info',['goods'=>$data]);
    }

    public function list(){
        $info = DB::table('goods')->where('sid','>',0)->get();
        // dd($info);
        foreach ($info as $k=>$v) {
            $a[] = $v->id;
        }
        $a = array_unique($a);

        
        $r = $this->look($a);
        $data = $this->fini($r);
        return $data;
    }
    // 查看是否有子类
    public function look($m){

        for($i=0;$i<count($m);$i++){
            $infos = DB::table('goods')->where('sid',$m[$i])->get();
            if($infos->first()){
                foreach ($infos as $k => $v) {
                    $a[] = $v->id; 
                }
            }else{
                $r[] = $m[$i];
            }
            
        }
        $a = array_unique($a);
        if(count($a)){
            return $r;
        }
        $this->look($a);

    }

    // 查看数据
    public function fini($m){
        // for($i=0;$i<count($m);$i++){
        //     $infos = DB::table('goods')->where('id',$m[$i])->get();
        //     $data[] = $infos;
        // }
        $data = DB::table('goods')->whereIn('id',$m)->get();
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 查看指定规格
    public function create($n=null)
    {

        $date = $this->list();
        if(!$n){
            $n = DB::table('goods_size')->min('gid');
            // $n = DB::table('goods_size')->where('id',$a)->first()->gid;
        }
        // dd($n);
        // return 3;
        $data = GoodsInfo::where('gid',$n)->get();

        return view('admin.goods.details',['good'=>$date,'goods'=>$data,'id'=>$n]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行添加规格
    public function store(Request $request)
    {
        $goods = new GoodsInfo;
        $goods->gid = $request->gid;
        $goods->name = $request->name;
        $goods->number = $request->number;
        $goods->price = $request->price;
        $goods->title = $request->title;
        if($request->hasFile('image')){
            // dd(1);
            $goods->image = $this->pic($request->image);
            // dd($goods->image);
            $goods->path = "/upload/goods/";
        }
        // dd($goods);
        $a = $goods->save();
        if($a){
            $txt = "上传成功";
        }else{
            $txt = "上传失败";
        }
        
        
        // return redirect()->action('Admin\GoodsInfoController@create',$request->gid);
        // return false;
            return redirect('admin/goodsinfo/create')->with('status', $txt);

    }

    // 上传图片
    public function pic($file){

            $img = Image::make($file);

            // $file=Request::file('uploadfile'); //1、使用laravel 自带的request类来获取一下文件



            $filedir="upload/goods/"; //2、定义图片上传路径
            $pre = "s_";//定义缩略图前缀


            //$imagesName=$file->getClientOriginalName(); //3、获取上传图片的文件名



            $extension = $file -> getClientOriginalExtension(); //4、获取上传图片的后缀名



            $newImagesName=md5(time()).random_int(5,5).".".$extension;//5、重新命名上传文件名字


            $a = $img->save($filedir.$newImagesName);
            if ($a) {  
  
                        $new_filename = $filedir.$newImagesName;  
  
                        $thumb_name = $pre.$newImagesName;  
  
                        $thumb = $filedir.$thumb_name;   
  
                         $img->resize(null, 60, function($constraint){       // 阻止可能的尺寸变化(保持图像大小)  
                            $constraint->aspectRatio();  
                            $constraint->upsize();  
                        });

                        $b = $img->save($filedir.$pre.$newImagesName);

                    }
            //$a = $file->move($filedir,$newImagesName); //6、使用move方法移动文件.

            if($b){
                return $newImagesName;
                // dd(1);
            }
            $txt = "上传失败";
            // dd(2);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 查询指定商品的规格
    public function show($id)
    {
        //
        // return 4;
        
        return $this->create($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 加载修改页面
    public function edit($id)
    {
        $date = $this->list();
        
        $aa = GoodsInfo::find($id);
        
        return view("admin.goods.infoedit",['goods'=>$date,'aa'=>$aa]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(Request $request, $id)
    {
        $data = GoodsInfo::find($id);
        // 获取图片路径
        $src1 = ltrim($data->path.$data->image,'/');
        
        $src2 = ltrim($data->path.'s_'.$data->image,'/');
        
        $goods = GoodsInfo::find($id);
        $goods->gid = $request->gid;
        $goods->name = $request->name;
        // dd($goods->name);
        $goods->number = $request->number;
        $goods->price = $request->price;
        $goods->title = $request->title;
        if($request->hasFile('image')){
            
            $goods->image = $this->pic($request->image);
            $goods->path = "/upload/goods/";
            
        }
        $a = $goods->save();
        if($a){
            $txt = "修改成功";
            if($goods->image != $data->image && $src1 != ''){
                unlink ($src1);
                unlink ($src2);
            }
           
        }else{
            $txt = "修改失败";
        }
        // return redirect()->action('Admin\GoodsInfoController@create',$request->gid);
        return redirect('admin/goodsinfo/create')->with('status', $txt);
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行删除
    public function destroy($id)
    {
        $data = GoodsInfo::find($id);
        // 获取图片路径
        $src1 = ltrim($data->path.$data->image,'/');

        $src2 = ltrim($data->path.'s_'.$data->image,'/');
        // dd($src1);
        $Rows = GoodsInfo::where('id', $id)->delete();
                if($Rows){
                    unlink ($src1);
                    unlink ($src2);
                    $txt = "删除成功";
                }else{

                    $txt = "删除失败";
                }
            return redirect('admin/goodsinfo/create')->with('status', $txt);

    }
    // 提交删除id
    public function del($id){

        return $this->destroy($id);
    }
}
