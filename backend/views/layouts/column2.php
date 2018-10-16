<?php 
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>

<?php $this->beginContent('@backend/views/layouts/main.php'); ?>


	<div class="row">
	  <div class="col-md-3">
		<div class="pg-sidebar">          
		  <?php 
			if(@$this->params['sideBar']!='') 
							echo $this->params['sideBar'];  
			  
		  ?>

		  <?= $this->blocks['toolbar']; ?>
		</div>      
	  </div>
	  <div class="col-md-9">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>	  
	  
        <?= $content ?>
	  </div>
	</div>
<?php $this->endContent(); ?>
