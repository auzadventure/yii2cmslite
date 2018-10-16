<?php

namespace frontend\models;

use Yii;
use common\models\Image as CommonImage;
use yii\helpers\Url;

class Image extends CommonImage {
	
	
	public static function getImage($page,$position) {
		
		$model =Image::find()->where(['page'=>$page,'position'=>$position])
				->one();
		if($model===null) { 
			throw new \yii\base\Exception('No such page',404);
			return '';
		}
		else return $model;	
	}
		

		
	
}

