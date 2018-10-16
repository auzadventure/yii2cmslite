<?php

namespace frontend\controllers;

use frontend\models\Page;

class PageController extends \yii\web\Controller
{
    public function actionView($slug)
    {
		$model = Page::getBySlug($slug);
		return $this->render('view',['model'=>$model]); 
    }

}
