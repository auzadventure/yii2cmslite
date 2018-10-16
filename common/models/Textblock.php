<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "textblock".
 *
 * @property int $id
 * @property string $page
 * @property string $position
 * @property string $block
 * @property int $type
 * @property string $datetimeCreate
 * @property string $datetimeUpdate
 */
class Textblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'textblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page', 'position', 'block', 'type', 'datetimeCreate', 'datetimeUpdate'], 'required'],
            [['block'], 'string'],
            [['type'], 'integer'],
            [['datetimeCreate', 'datetimeUpdate'], 'safe'],
            [['page', 'position'], 'string', 'max' => 30],
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
            'block' => 'Block',
            'type' => 'Type',
            'datetimeCreate' => 'Datetime Create',
            'datetimeUpdate' => 'Datetime Update',
        ];
    }
	
	public static function getType($key='') {
		$a = [
			0=>'text',
			1=>'html'
			];
		
		if ($key==='') return $a;
		else return $a[$key];
	}
	
	public static function getTextBlock($page,$position) {
		$model =Textblock::find()->where(['page'=>$page,'position'=>$position])
				->one();
		if($model===null) 
			//throw new \yii\base\Exception('No such page',404);
			return '';
		else return $model->block;		
	}
}
