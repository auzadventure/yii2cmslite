<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TextblockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="textblock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'page') ?>

    <?= $form->field($model, 'position') ?>

    <?= $form->field($model, 'block') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'datetimeCreate') ?>

    <?php // echo $form->field($model, 'datetimeUpdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
