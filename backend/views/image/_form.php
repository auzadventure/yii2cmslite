<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Image */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="image-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php if($model->isNewRecord) {
			echo $form->field($model, 'page')->textInput(['maxlength' => true])
										->hint('Page Where Image Will be');
	    }	  
	?>
	
	<?= $form->field($model, 'title')->textInput() ?>
	
	

    <?php 
	if($model->isNewRecord) {
	echo $form->field($model, 'position')->textInput(['maxlength' => true]); 
	}
	?>
	
	<?= $form->field($model, 'imageFile')->fileInput(['class'=>'form-control-file']) ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
