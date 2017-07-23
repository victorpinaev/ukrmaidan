<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m170607_185128_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'img' => $this->string(250),
            'title' => $this->string(250),
            'issue' => $this->string(4),
            'description' => $this->text(),
            'rating' => $this->float()->defaultValue(0),
            'category_id' => $this->integer(),
            'created_at' => $this->integer(),
            'duration' => $this->string(250),
            'rating_count' => $this->integer()->defaultValue(0),
            'extension' => $this->string(250),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
