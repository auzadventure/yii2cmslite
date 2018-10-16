<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Navmenu */

$this->title = 'Create Navmenu';
$this->params['breadcrumbs'][] = ['label' => 'Navmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="navmenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
