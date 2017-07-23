<?php

use yii\db\Migration;

class m170611_162056_insert_default_tag extends Migration
{
    public function safeUp()
    {
        $this->execute("
            INSERT INTO `tag` (`id`, `tag_category_id`, `name`) VALUES
            (1, 3, 'Dwayne Johnson'),
            (2, 3, 'Jackie Chan'),
            (3, 3, 'Matt Damon'),
            (4, 3, 'Jennifer Lawrence'),
            (5, 3, 'Angelina Jolie'),
            (6, 1, 'action '),
            (7, 1, 'comedy'),
            (8, 1, 'drama'),
            (9, 2, 'Allen Weinstein'),
            (10, 2, 'Bill Smith'),
            (11, 4, 'mp4'),
            (12, 4, 'pdf');
        ");
    }

    public function safeDown()
    {
        $this->truncateTable('tag');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170611_162056_insert_default_tag cannot be reverted.\n";

        return false;
    }
    */
}
