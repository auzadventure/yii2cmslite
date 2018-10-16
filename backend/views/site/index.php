<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">


	
        <div class="row">
            <div class="col-lg-8">
                <h2>Settings</h2>
			<table class='table table-bordered'>
				<tr>
					<th>#</th>
					<th>Option</th>
					<th>Description</th>
				</tr>

				
			
				<tr>
					<td></td>
					<td><?= Html::a('Setting Variables',['settingvar/'])?></td>
					<td>System Setting Variables </td>
				</tr>
				<tr>
					<td></td>
					<td><?= Html::a('Navigation Menu',['navmenu/'])?></td>
					<td>Manage the Navigation Menu</td>
				</tr>

			</table>
				
				
				
			</div>
	</div>

 </div>



