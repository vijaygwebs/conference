<?php

namespace common\traits;

use Imagine\Image\Point;
use Yii;
use yii\imagine\Image;

trait ImageUploadTrait
{

 	public function uploadImage($image,$name,$main_folder,$size)
    {

		$imagine = new Image();		
		$folders = Yii::$app->params['folders']['name'];
		$image_name = $name.'.'. $image->extension;
		foreach($folders as $folder){
			
			$$folder = Yii::$app->params[$folder] . $main_folder .'/'. $image_name;
			if (!file_exists(Yii::$app->params[$folder] . $main_folder )) {

				mkdir(Yii::$app->params[$folder] . $main_folder , 0755, true);
				
			}
		}

		if($image->saveAs($uploadMain, ['quality' => 80])){
		
			$imagineObj =  yii\imagine\Image::getImagine();
			
			$imageObj = $imagineObj->open($uploadMain);
			$i = 0;
			foreach($folders as $folder){
				$imaginename = 'imgobj'.$i;
				if($folder == 'uploadThumbs' && $size[$folder] != ''){		
					Image::thumbnail($uploadMain, $size[$folder], $size[$folder])
						->save(Yii::$app->params[$folder] . $main_folder .'/'. $image_name, ['quality' => 80]);	   
				}else if($folder != 'uploadMain' && $size[$folder] != ''){
					$$imaginename = $imagineObj->open($uploadMain);	
					
					$$imaginename->resize($$imaginename->getSize()->widen($size[$folder]))->save(Yii::$app->params[$folder] . $main_folder .'/'. $image_name);	
				}
				
				$i++;
			}
			
			return $image_name;
		}else{
			return false;
		}
    }

	public function uploadFile($file,$name,$main_folder)
	{
		$filename =  $name.'.'. $file->extension;
		$uploadPath = "uploads/" . $main_folder .'/'. $filename;
		if (!file_exists("uploads/" . $main_folder )) {
			mkdir("uploads/". $main_folder , 0777, true);
		}
		if($file->saveAs($uploadPath)){
			return $filename;
		}else{
			return false;
		}
	}
}


