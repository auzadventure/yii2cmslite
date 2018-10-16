<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Textblock */

$this->title = 'Create Textblock';
$this->params['breadcrumbs'][] = ['label' => 'Textblocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="textblock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
