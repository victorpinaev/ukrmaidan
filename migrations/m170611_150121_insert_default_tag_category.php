<?php

use yii\db\Migration;

class m170611_150121_insert_default_tag_category extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('tag_category', ['name'], [
            ['genre'],['producer'],['actor'],['format']
        ]);

    }

    public function safeDown()
    {
        $this->truncateTable('tag_category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170611_150121_insert_default_tag_category cannot be reverted.\n";

        return false;
    }
    */
}
