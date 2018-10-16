<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Page */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cat',
            'title',
            ['label'=>'url',
			 'value'=> function($model) { 
						$slug = "page/view/slug/".$model->slug;
						return $slug . ' ' . Html::a('view',"@web/../../".$slug);
						},
			 'format'=>'html'
						
			 ],
            //'body:ntext',
            'tags',
            'datetimeCreate',
            'datetimeUpdate',
            'status',
        ],
    ]) ?>

	
	<h3>Content</h3>
	<div class="panel panel-default">
	  <div class="panel-body">
	    <h3> <?=$model->title ?> </h3>
	  
		<?= $model->body?>
	  </div>
	</div>

	
	
</div>
