<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m170607_185258_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'tag_category_id' => $this->integer(),
            'name' => $this->string(250),
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tag');
    }
}
