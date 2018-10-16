<?php

namespace common\models;


use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\HttpException;
use yii\web\UploadedFile;

use yii\imagine\Image as Imagine;

use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $page
 * @property string $position
 * @property string $fullpath
 * @property int $title
 */
class Image extends \yii\db\ActiveRecord
{
   
   public $imageFile;
  
   public $path = '/frontend/web/uploads/pageImages';
   public $webPath;
   public $backendPath = '/../..';
   
   public $thumb_width = 200;
  
   /**
     * @inheritdoc
     */
	 
	public static function tableName()
    {
        return 'image';
    }
	
	public function init() {
/* 		if (Yii::$app->params['imageWebPath']=='') {
				throw new HttpException('400','Variable imagewebpath not set');
		}
		$this->webPath = Yii::$app->params['imageWebPath'];  */
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page', 'position', 'title'], 'required'],
            
			[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on'=>'create'],
            [['page', 'position'], 'string', 'max' => 15],
            [['fullpath','title'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page' => 'Page',
            'position' => 'Position',
            'fullpath' => 'Fullpath',
            'title' => 'Title',
        ];
    }
	
	
	public function getUploadPath($file) {
		$imagePath = \Yii::getAlias('@webroot') . $this->backendPath . $this->path."/";
		return $imagePath.$file; 
	}	
	
	public function createThumb() {
		$source = $this->getUploadPath($this->fullpath);
		$thumbName = $this->getThumbName();
		$thumbPath = $this->getUploadPath($thumbName);

		Imagine::thumbnail($source, 150, null)
			->save($thumbPath, ['quality' => 80]);		 
		
	}
		
	public function getFullPath() {
		$path = $this->webPath.'/'. $this->fullpath;
		return $path;
	}
	
	public function getImgUrl() {
		$path = Url::to('@web/',true).$this->path.$this->getFullPath(); 
		return $path;
	}
	
	public function getImgUrlBackend() {
		$path = Url::to('@web/',true)."../..". $this->path."/".$this->fullpath; 
		return $path;		
		
	}
	
	//public function get
	
	
	
	// Add _thumb .ext to the name 
	public function getThumbName() {
		$name = substr($this->fullpath,0,strlen($this->fullpath)-4);
		$ext = substr($this->fullpath,-4);
		$thumbName = $name.'_thumb'.$ext;		
		return $thumbName;
	}

	
	public function showImg() {
		$path = Url::to('@web/frontend',true).$this->getFullPath();
		echo "<img src=\"{$path}\">";
	}
	
	public function showThumb() {
		$path = Url::to('@web',true).$this->path.'/'.$this->getThumbName();
		return "<img src=\"{$path}\">";
	}
	
	public function showThumbBackend() {
		$path = Url::to('@web',true).$this->backendPath.
									 $this->path.'/'.
									 $this->getThumbName();
		return "<img src=\"{$path}\">";
	}		
		
	
	
	
	public function unlinkImg() {
		$source = $this->getUploadPath($this->fullpath);
		
		if (file_exists($source)) {
			unlink($source);
			return true; 
		}
		else return false;
	}

	public function unlinkThumb() {
		$source = $this->getUploadPath($this->getThumbName());
		if (file_exists($source)) {
			unlink($source);
			return true; 
		}
		else return false;
	}	
	
	// Backend 
	public static function getImagesLike($id) {
		$pageName = 'page'.$id.'.';
		$models = Image::find()->where(['like', 'fullpath', $pageName])->all();
		$a = [];
		foreach($models as $model) {
			$a[] = ['title'=>$model->title,'value'=>$model->getFullPath()];
		}
		return $a;
	}
	
}
