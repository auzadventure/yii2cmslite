<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\Textblock;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Textblocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="textblock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Textblock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<style>
	input[name='TextblockSearch[id]'],
	input[name='TextblockSearch[page]'],
	input[name='TextblockSearch[position]']	{
		width:30px;
	}
	</style>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page',
            'position',
            'block:ntext',
            ['attribute'=>'type',
			 'value'=> function($model) { return $model->getType($model->type);},
			 'filter'=>Textblock::getType()
			 ],
            // 'datetimeCreate',
            // 'datetimeUpdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
