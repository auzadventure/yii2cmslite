<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $cat
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $tags
 * @property string $datetimeCreate
 * @property string $datetimeUpdate
 * @property int $status
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat', 'title', 'slug', 'body', 'tags', 'datetimeCreate', 'datetimeUpdate', 'status'], 'required'],
            [['body'], 'string'],
            [['datetimeCreate', 'datetimeUpdate'], 'safe'],
            [['status'], 'integer'],
            [['cat'], 'string', 'max' => 30],
            [['title', 'tags'], 'string', 'max' => 150],
            [['slug'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat' => 'Category',
            'title' => 'Title',
            'slug' => 'Slug',
            'body' => 'Main Body',
            'tags' => 'Tags',
            'datetimeCreate' => 'Datetime Create',
            'datetimeUpdate' => 'Datetime Update',
            'status' => 'Status',
        ];
    }
	
	public function getStatus($key='') {
		$a = [
			0 => 'hidden',
			1 => 'show'];
		if($key==null) return $a;
		else return $a[$key];
	}
}
