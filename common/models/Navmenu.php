<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "navmenu".
 *
 * @property int $id
 * @property string $label
 * @property string $url
 * @property string $isChild
 * @property int $parentID
 * @property int $sortOrder
 */
class Navmenu extends \yii\db\ActiveRecord
{
    public $maxSortOrder;
	
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'navmenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'url', 'isChild', 'sortOrder'], 'required'],
            [['parentID', 'isChild', 'sortOrder'], 'integer'],
            [['label'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'url' => 'Url',
            'isChild' => 'Is Child',
            'parentID' => 'Parent ID',
            'sortOrder' => 'Sort Order',
        ];
    }
	
	public static function getIsChild($key=0) {
		$a = [0=>'no',1=>'yes'];
		if($key==='') return $a;
		else return $a[$key];
		
	}
	
	public function getMaxSortOrder($parentID='') {
		$model = Navmenu::find()->filterWhere(['parentID'=>$parentID])
								->orderBy('sortOrder')
								->one();
		if ($model == null) return 1;				  
		return $model->sortOrder + 1;
	}
	
	public static function childNo($id) {
		$models = Navmenu::find()->filterWhere(['parentID'=>$id])->all();
		return count($models);
	}
	
	public static function getNavMenu() {
		$models = Navmenu::find()->where(['isChild'=>0])->orderBy('sortOrder')->all();
		foreach ($models as $model) {
			$items = Navmenu::getChildMenu($model->id);
			$menuItems[] = ['label'=>$model->label,'url'=>explode(',',$model->url), 'items'=>$items];
		}
		return $menuItems;
	}
	
	private static function getChildMenu($id) {
		$menuItems = [];
		
		if(Navmenu::childNo($id)>0) {
			$models = Navmenu::find()->where(['isChild'=>1,'parentID'=>$id])->all();
			foreach ($models as $model) {
				$menuItems[] = ['label'=>$model->label,'url'=>explode(',',$model->url)];
			}
		}				
		return $menuItems;
	}
	
}
