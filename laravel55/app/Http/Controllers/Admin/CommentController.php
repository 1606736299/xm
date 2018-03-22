<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{

	public function sep($id){

		return $this->index($id);

	}
    //加载评论页面
	public function index($id=''){

		$data = $this->list();

		if($id){
			$request = Comment::where('gid',$id)->get();
		}else{

			$request = Comment::all();
		}
		

		// dd($data);

		return view('admin.comment.comment',['good'=>$data,'goods'=>$request,'id'=>$id]);
	}


	// 加载回复页面
	public function edit($id){


		return view('admin.comment.reply',['id'=>$id]);

	}

	//执行回复
	public function update(Request $request,$id){

		$goods = new Reply;
        $goods->cid = $id;
        $goods->title = $request->title;
        $a = $goods->save();
        if($a){

        	
        	$con = Comment::find($id);
        	$con->reply = $con->getOriginal('reply')+1;
        	$b = $con->save();

        }
        if($b){
        	$txt = "添加成功";
        }else{
        	$txt = "添加失败";
        }	
        
        return redirect('admin/comment')->with('status', $txt);

	}


	public function show($id){

		$s = Comment::find($id);
		if($s->getOriginal('state') == 0){
			$s->state = 1; 
		}else{
			$s->state = 0;
		}

		$j = $s->save();
		// dd($j);
		if($j && $s->getOriginal('state') == 0){
        	$txt = "屏蔽成功";
        }else if($j){
        	$txt = "显示成功";
        }else{
        	$txt = "操作失败";
        }

        return redirect('admin/comment')->with('status', $txt);

	}

	// 查最低分类
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
    
        $data = DB::table('goods')->whereIn('id',$m)->get();
        return $data;
    }
}
