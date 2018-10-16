<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Navmenu */

$this->title = $model->label;
$this->params['breadcrumbs'][] = ['label' => 'NavMenu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->label;
?>
<div class="navmenu-view">

	<h1> NavMenu &gt;&gt; <?= $model->label?></h1>
   

	<hr>
	
	<p><?= Html::a('Create Sub Menu', ['create_submenu', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
     </p>   
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',
            'url:url',
            //'isChild',
            //'parentID',
            'sortOrder',

            ['class' => 'yii\grid\ActionColumn',
			 'buttons' => ['view'=> function($url,$model,$key) { return ''; }]
			
			],
        ],
    ]); ?>	
	
</div>
