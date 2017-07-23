<?php

use yii\db\Migration;

class m170611_170218_foreign_key_tag_table extends Migration
{
    public function safeUp()
    {
        // creates index for column `category_id`
        $this->createIndex(
            'idx-tag-tag_category_id',
            'tag',
            'tag_category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-tag-tag_category_id',
            'tag',
            'tag_category_id',
            'tag_category',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-tag-tag_category_id',
            'tag'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-tag-tag_category_id',
            'tag'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170611_150218_foreign_key_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
