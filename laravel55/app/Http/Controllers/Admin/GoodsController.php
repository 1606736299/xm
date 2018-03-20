<?php

namespace App\Http\Controllers\Admin;

use App\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示所有商品
        $goods = Goods::all();
        
        return view('admin.goods.goods',['goods'=>$goods]);
    }

    public function add($sid=-1){
        
        // 加载商品添加页面
        if($sid>0){
            $aa = DB::table('goods')->where('id',$sid)->get();
            
            return view("admin.goods.add",['aa'=>$aa]);
        }else{

            return view("admin.goods.add",['sid',$sid]);
        }
            
            
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 3;

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
        // 添加商品
        $goods = new Goods;
        $goods->sid = $request->sid;
        $goods->name = $request->name;
        $goods->save();
        return redirect()->action('Admin\GoodsController@index');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 加载修改页面
        $aa = Goods::find($id);

        // dd($aa->getOriginal('state'));
        return view("admin.goods.edit",['id'=>$id,'aa'=>$aa]);
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
        // dd($request) ;
        $goods = array();
        $goods['name'] = $request->name;
        $goods['state'] = $request->state;
        $m = Goods::where('id',$id)->update($goods);       
        if($m){

            $txt = "修改成功";
            
            return redirect('admin/goods')->with('status', $txt);
            
        }else{
            
            $txt = "修改失败";
        
            return redirect('admin/goods/'.$id.'/edit')->with('status', $txt);
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
        
    }


    // 删除
    public function del($id){
        
        $result = DB::table('goods')->where('sid',$id)->get();
            $null = $result->all();
            // dd($null);
            if($null){

                $txt = "内部还有信息不可删除";

            }else{

                $Rows = Goods::where('id', $id)->delete();
                if($Rows){

                    $txt = "删除成功";
                }else{

                    $txt = "删除失败";
                }

            }

            return redirect('admin/goods')->with('status', $txt);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

}
