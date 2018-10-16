<?php
use yii\helpers\Html;

use common\models\Textblock;
use frontend\models\Image;

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
		<h1> Wesvault CMS Lite </h1>

	</div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Backend</h2>

                <p><?= Html::a('Admin Backend',['backend/web'],["class"=>"btn btn-primary"]); ?>
            </div>
            <div class="col-lg-4">
			
				<h2> Navigation Menu </h2>
				<p>Configure Navigation Links At the Backend</p>
			
				<h2> Settings Table </h2>
				<p>Store Settings</p>
			
			
                <h2>Textblock</h2>
				<p>Update Textblocks in Html or Text</p>

                <p><?= Textblock::getTextBlock('home','main1')?></p>
				<p>
				<code>&lt;Textblock::getTextBlock('home','main1')&gt;</code> 
				
				<h2>Page</h2>
				<p>Create Pages on the fly</p>
				<?= Html::a('My First Page',['page/view/slug/my-first-page']) ?>
				
             </div>
            <div class="col-lg-4">
			
			<h2> Image Media Manager </h2>
			<p>Insert images</p>
			<p> <?php $imgObj = Image::getImage('home','main'); ?></p>
					
					
			<h4> Url </h4>		
					  
			<?php echo $imgObj->getImgUrl(); ?>		  
					  
					  
					  
			<h4> Thumb </h4>		  
					  
			<?php echo $imgObj->showThumb() ; ?>		  
			
			
			<h4> Full Size Image </h4>
			
			<?= Html::img($imgObj->getImgUrl(),['style'=>'width:200px']); ?>
			
            </div>
        </div>

    </div>
</div>
