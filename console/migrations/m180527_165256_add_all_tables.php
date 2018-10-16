<?php

use yii\db\Migration;

class m180527_165256_add_all_tables extends Migration
{
    public function safeUp()
    {
		$this->insert('image',['page'=>'home','position'=>'main','fullpath'=>'home.main.png','title'=>'main image']);

		
		$this->insert('navmenu',['label'=>'home','url'=>'main',
								'isChild'=>0,'parentID'=>'','sortOrder'=>1]);

		
    }

    public function safeDown()
    {
        echo "m180527_165256_add_all_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180527_165256_add_all_tables cannot be reverted.\n";

        return false;
    }
    */
}
