<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Textblock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="textblock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'block')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->dropDownList($model->getType()) ?>
	
	<?php if($model->isNewRecord) 
			$model->datetimeCreate = Yii::$app->params['datetimeSQL'] ?>
    
	<?= $form->field($model, 'datetimeCreate')->hiddenInput()->label(false) ?>

	<?php $model->datetimeUpdate = Yii::$app->params['datetimeSQL'] ?>	

    <?= $form->field($model, 'datetimeUpdate')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
