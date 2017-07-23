<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag_category`.
 */
class m170611_143025_create_tag_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tag_category');
    }
}
