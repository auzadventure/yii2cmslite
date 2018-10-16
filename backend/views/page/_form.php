<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//wysiwug editor
use dosamigos\tinymce\TinyMce;
use dosamigos\selectize\SelectizeTextInput;

use common\models\Image;
/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
	

	<div class="form-group">
	<?= Html::a('<span class="glyphicon glyphicon-picture"></span> Add Image',
					['image/create'],['class'=>'btn btn-default'])?>
	<?= Html::a('<span class="glyphicon glyphicon-picture"></span> Manage Image',
				['image/index','ImageSearch[page]'=>'page'.$model->id],['class'=>'btn btn-default'])?>
</div>

    <?= $form->field($model, 'body')->widget(TinyMce::className(), [
					'options' => ['rows' => 20],
					//'language' => 'en',
					'clientOptions' => [
						'plugins' => [
							"advlist autolink image link charmap anchor",
							"searchreplace visualblocks code fullscreen",
							"insertdatetime media table contextmenu paste"
						],
						'image_list' => Image::getImagesLike($model->id),
						'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
					]
				]); 
	?>

    <?= $form->field($model, 'tags')
			->widget(SelectizeTextInput::className(),
				[        
				'clientOptions' => ['valueField' => 'name',
									'labelField' => 'name',
									'searchField' => ['name'],
									 'create' => true,
									]
				]
				); 
	?>

    <?php  
	    if($model->isNewRecord==1) {
			echo $form->field($model, 'datetimeCreate')
			     ->textInput(['value'=>Yii::$app->params['datetimeSQL'],
				     		 ]) ;
		}
	?>

    <?= $form->field($model, 'datetimeUpdate')
			 ->hiddenInput(['value'=>Yii::$app->params['datetimeSQL']])
			 ->label(false)?>


    <?= $form->field($model, 'status')->dropDownList($model->getStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
