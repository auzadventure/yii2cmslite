<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>

	<style>
	input[name='ImageSearch[id]'],
	input[name='ImageSearch[page]'],
	input[name='ImageSearch[position]']	{
		width:30px;
	}
	</style>

<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Image', ['create','ImageSearch[page]'=>$page], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			['attribute'=>'page',
			 'value'=> function($model) { 
					return Html::a($model->page,['page/viewpage','page'=>$model->page]);},
			 'format'=>'html'
            ],
			'position',
            'fullpath',
            'title',
			['label'=>'Thumb',
			 'value'=> function($model) { return $model->showThumbBackend();},
			 'format'=>'html'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
