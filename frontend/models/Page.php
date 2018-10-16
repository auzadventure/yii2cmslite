<?php

namespace frontend\models;

use common\models\Page as CommonPage;

class Page extends CommonPage {
	
	
	public static function getBySlug($slug) {
		
		$model =Page::find()->where(['slug'=>$slug])->one();
		if($model===null) 
			throw new \yii\base\Exception('No such page',404);
		else return $model;
	}
	
}

