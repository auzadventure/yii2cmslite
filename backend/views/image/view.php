<?php

use yii\helpers\{Html, Url};
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Image */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-view">

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
            'page',
            'position',
            'fullpath',
			['label'=>'webUrl',
			 'value'=> function($model) { return $model->getFullPath();}
			 ],
            'title',
			['label'=>'image',
			 'value'=> function($model) { return $model->showThumb(); },
			 'format'=>'html']
        ],
    ]) ?>
	
	<h3> Full Image </h3>
	<div class="panel panel-default">
	  <div class="panel-body">
		<img style="width:100%" src="<?=$model->getImgUrlBackend()?>">
	  </div>
	</div>	
	<div class="">Click Reload To Refresh Image On Upload</div>
</div>
