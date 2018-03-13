<?php 
namespace App\Http\Controllers\Admin;
use Image;
//图片等比缩放函数
/**
 * 图片等比缩放函数
* @param  $file 图片信息哦
* @param  $site 保存图片路径
*/
	//等比例缩小图片
class Imagesx{


	public static function imageResize($file,$site,$Adminuser,$maxheight=60,$maxwidth=60){
		 ////执行图片添加
            $realPath = $file->getRealPath();//临时文件的绝对路径 

            $info = getImagesize($realPath);//获取文件大小

            //根据图片的类型创建已知图片画布
            switch($info[2]){
                case 1://gif格式
                    $srcim = imagecreatefromgif($realPath);
                    break;
                case 2://jpeg格式
                    $srcim = imagecreatefromjpeg($realPath);
                    break;
                case 3://png格式
                    $srcim = imagecreatefrompng($realPath);
                    break;
                case 3://bmp格式
                    $srcim = imagecreatefrombmp($realPath);
                    break;
                case 3://svg格式
                    $srcim = imagecreatefromsvg($realPath);
                    break;    
            }
            $width = $info[0];//获取图片宽度
            $height = $info[1];//获取图片高度
            //计算出缩放后的图片尺寸
            if($maxwidth/$width<$maxheight/$height){
                $w = $maxwidth;
                $h = $height*($maxwidth/$width);
            }else{
                $h = $maxheight;
                $w = $width*($maxheight/$height);
            }
            //创建缩放后的画布
            $dstim = imagecreatetruecolor($w,$h);
            //执行缩放
           imagecopyresampled($dstim,$srcim,0,0,0,0,$w,$h,$width,$height);
           //缩放后前缀名
            $pre="x_";
             //获取文件的后缀
            $extension = $file->getClientOriginalExtension();
            //获取随机名
             $newImagesName=mt_rand(1000,99999);
             //获取时间戳
             $time = time();
             //拼接文件名
             $novel = $newImagesName.$time;
             //小图保存到指定位置
            imagejpeg($dstim, $site. $pre.$novel.'.'.$extension);
            $img = Image::make($file);
             //原图保存到指定位置
             $img->save($site.$novel.'.'.$extension);
             $Adminuser->imaged = $novel.'.'.$extension;
            $Adminuser->imagex = $pre.$novel.'.'.$extension;
            //销毁资源
            imagedestroy($srcim);
            imagedestroy($dstim);
            return $Adminuser->imagex; 
	}
}

 ?>