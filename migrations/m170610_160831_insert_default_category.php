<?php

use yii\db\Migration;

class m170610_160831_insert_default_category extends Migration
{
    public function safeUp()
    {
        $this->execute("
            INSERT INTO `category` (`id`, `title`) VALUES
            (1, 'Movies'),
            (2, 'TV Series'),
            (3, 'Music'),
            (4, 'eBooks');
        ");
    }

    public function safeDown()
    {
        $this->truncateTable('category');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170610_160831_insert_default_category cannot be reverted.\n";

        return false;
    }
    */
}
