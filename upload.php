<?php 
$http = 'http://'.$_SERVER['HTTP_HOST'].'/';
if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = date('dmYHis-').str_replace(' ','',$file_name) ;
 $path = 'upload/public/'.date('Y').'/'.date('m').'/'.date('d');
 if (!is_dir($path))
    {
        mkdir($path, 0777, true);
    }
 //chmod('upload/public', 0777);
 $allowed_extension = array("jpg", "gif", "png");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, $path.'/' . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = $http.$path.'/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}