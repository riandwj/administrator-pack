<?php
namespace App\Helper;
class UploadImage
{
  public static function upload($folder,$image,$width=null,$height=null)
  {
    $path = ""; $compress_path = "";
    if(is_array($image)){
      foreach($image as $img){
        $filename = uniqid().".".$img->getClientOriginalExtension();
        $img->move('images/uploads/'.$folder,$filename);
        $path.= 'images/uploads/'.$folder."/".$filename."::";
        if($height!=null){
          $compress = \Image::make(asset("images/uploads/".$folder."/".$filename));
          $compress->resize($width, $height);
          $compress->save("images/compressed/".$folder."/".$filename);
        }
        $compress_path.='images/compressed/'.$folder."/".$filename."::";
      }
    }else{

      $filename = md5(uniqid()).".".$image->getClientOriginalExtension();

      $image->move('images/uploads/'.$folder,$filename);

      $path = "images/uploads/".$folder."/".$filename;

      if($height!=null){
        $compress = \Image::make(asset("images/uploads/".$folder."/".$filename));
        $compress->resize($width, $height);
        $compress->save("images/compressed/".$folder."/".$filename);
      }
      $compress_path= "images/compressed/".$folder."/".$filename;

    }
    return array("image_path"=>$path,"compress_path"=>$compress_path);
  }

  public static function delete($path)
  {
    foreach(explode("::",$path) as $temp){
      if(\File::exists($temp) && \File::isFile($temp)) {
          if($path != "images/uploads/product01.jpg"){
            \File::delete($temp);
        }
      }
    }
  }
}
