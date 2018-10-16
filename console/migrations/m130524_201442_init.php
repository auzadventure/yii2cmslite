<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
		
		
        $this->createTable('textblock', [
            'id' => $this->primaryKey(),
            'page' => $this->string(255)->notNull()->unique(),
            'position' => $this->string(32)->notNull(),
            'block' => $this->string(25)->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'datetimeCreate' => $this->dateTime()->notNull(),
			'datetimeUpdate' => $this->dateTime()->notNull(),
        ]);		
		
	    $this->createTable('image', [
            'id' => $this->primaryKey(),
            'page' => $this->string(100)->notNull(),
            'position' => $this->string(32)->notNull(),
            'fullpath' => $this->string(50)->notNull(),
            'title' => $this->string(50)->notNull(),
        ]);	

	    $this->createTable('navmenu', [
            'id' => $this->primaryKey(),
            'label' => $this->string(50)->notNull(),
            'url' => $this->string(50)->notNull(),
            'isChild' => $this->string(10)->notNull(),
            'parentID' => $this->smallInteger(),
			'sortOrder'=> $this->smallInteger()->notNull(),
        ]);	
		
	    $this->createTable('page', [
            'id' => $this->primaryKey(),
            'cat' => $this->string(50)->notNull(),
            'title' => $this->string(100)->notNull(),
            'slug' => $this->string(50)->notNull(),
            'body' => $this->text()->notNull(),
			'tags'=> $this->string(100)->notNull(),
			'datetimeCreate'=> $this->dateTime()->notNull(),
			'datetimeUpdate'=> $this->dateTime()->notNull(),
			'status'=> $this->smallInteger(2)->notNull()
        ]);			
		
	    $this->createTable('settingvar', [
            'id' => $this->primaryKey(),
            'type' => $this->string(25)->notNull(),
            'name' => $this->string(25)->notNull(),
            'value' => $this->string(25)->notNull(),
        ]);		

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
