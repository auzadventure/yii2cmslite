<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Settingvar */

$this->title = 'Create Settingvar';
$this->params['breadcrumbs'][] = ['label' => 'Settingvars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settingvar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
