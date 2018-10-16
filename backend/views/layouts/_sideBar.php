<?php 

use yii\helpers\Html;

$class = 'list-group-item list-group-item-action';
?>
<style>
.glyphicon {
	margin-right: 10px;
}
</style>




<div class="list-group">
  <div class="list-group-item list-group-item-success">
    Options
  </div>
  <?= Html::a('<span class="glyphicon glyphicon-cog"></span>Main',['/site'],["class"=>$class])?>  
  <?= Html::a('<span class="glyphicon glyphicon-file"></span>Page',['/page'],["class"=>$class])?>
  <?= Html::a('<span class="glyphicon glyphicon-list-alt"></span>Textblock',['/textblock'],["class"=>$class])?>
  <?= Html::a('<span class="glyphicon glyphicon-picture"></span>Image',['/image'],["class"=>$class])?>

</div>
