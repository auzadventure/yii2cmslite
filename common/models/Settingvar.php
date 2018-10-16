<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "settingvar".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $value
 */
class Settingvar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settingvar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'value'], 'required'],
            [['type'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 25],
            [['value'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'value' => 'Value',
        ];
    }
	
	public function getVal($varName) {
		return Settingvar::findOne(['name'=>$varName])->value;
	}
}
