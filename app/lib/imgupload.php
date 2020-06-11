<?php
namespace lib;
use lib\img_proccess;
trait imgupload
{
    public function multipleuploads($inpt,$src,$anime_name){
        global $con;
        $image = $_FILES[$inpt];
        $image_name = $image['name'];
        $image_type = $image['type'];
        $image_temp = $image['tmp_name'];
        $image_size = $image['size'];
        $image_eror = $image['error'];
        $allowed_extension = array('jpg','gif','png','jpeg');
        $files_count = count($image_name);
        try{
            $finalName = [];
            for($i = 0; $i < $files_count; $i++){
                $errors = []; 
                $imgnamearr = array();
                if(!empty($image_name[$i])){
                    $finalName[$i] =  rand(0,100000000000).'_'.time().'_'.$image_name[$i];
                }else{
                    $finalName[$i] = null;
                }
                $ex_arr = explode('.',$image_name[$i]);
                $img_ex = strtolower(end($ex_arr));
                if($image_eror[$i] == 4){
                    $errors[] = 'No File Uploaded';
                }else{
                    if($image_size[$i] > 5000000){
                        $errors[] = 'الصوره كبيره للغايه';
                    }
                    if(! in_array($img_ex,$allowed_extension)){
                        $errors[] = 'لا يمكن رفع ملف بهذه الصيغه';
                    }
                }
                if(empty($errors)){
                    $this->create_anime_folder($anime_name);
                    move_uploaded_file($image_temp[$i],"$src$finalName[$i]");
                    $uploaded = new img_proccess("$src$finalName[$i]");
                    $uploaded->resizeTo($uploaded->origWidth,$uploaded->origHeight,'maxwidth');
                    $uploaded->saveImage($src.'_original_'.$finalName[$i],100);
                    $uploaded->deteleFile();
                    $low_quality = new img_proccess($src.'_original_'.$finalName[$i]);
                    $low_quality->resizeTo(($low_quality->origWidth/2),$low_quality->origHeight,'maxwidth');
                    $low_quality->saveImage($src.'_low_quality_'.$finalName[$i],50);
                }else{
                    $_SESSION['upload_error'] = $errors;
                }
            }
            $imgsNameInDb = implode(',',$finalName);
            return !empty($finalName) ? $imgsNameInDb : null;
        }catch(Exception $e){
            echo 'Caught exception: '.$e->getMessage();
        }
    }
}