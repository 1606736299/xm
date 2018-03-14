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
        $stu = Banner::orderBy('id', 'desc')->get();
        // $stu = Banner::get();
        // dd($stu);
        $ss = [1,4];
        // dd($ss);
        $id = "";
         foreach ($stu as $key) {
           for($i=0;$i<count($ss);$i++){
                if($ss[$i]<$key->id){
                     $id = $key->id;
                     if($id<$key->id){
                        $id = $key->id;
                     }
                }
           }
         }
         dd($id);
        // dd($stu[banner][id]);
        //  dd($key->id);
        // dd($stu->id);
        // $id = $this->id;
        // $Banner =  new Banner();
        // dd($Banner->id);
       // dd(DB::insertGetId());
        // echo mysql_insert_id();
        return view('admin.banner', ['stu' => $stu,'id'=>$id]);
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
    public function update(Request $request, $id)
    {
        //
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
