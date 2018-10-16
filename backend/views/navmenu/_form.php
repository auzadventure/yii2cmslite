<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Navmenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="navmenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isChild')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'parentID')->hiddenInput()->label(false) ?>

	<?php if($model->isNewRecord) $model->sortOrder = $model->getMaxSortOrder($model->parentID); ?>
    <?= $form->field($model, 'sortOrder')->textInput()
										 ->hint('what order it will appear in menu')?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
