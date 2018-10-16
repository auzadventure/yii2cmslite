<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\Navmenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NavmenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'NavMenu';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="navmenu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parent Menu Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'label',
            'url:url',
			'sortOrder',
			['label'=>'Sub-Menu',
			 'value'=> function($model) { return $model->childNo($model->id);}],
			
			
            /* ['attribute'=>'isChild',
			 'value'=> function($model) { return $model->getIsChild($model->isChild);}
			], */
            //'parentID',
            

            ['class' => 'yii\grid\ActionColumn',

			]
        ],
    ]); ?>
</div>
