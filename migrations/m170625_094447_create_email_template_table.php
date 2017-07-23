<?php

use yii\db\Migration;

/**
 * Handles the creation of table `email_template`.
 */
class m170625_094447_create_email_template_table extends Migration
{
    /**
     * This is the model class for table "{{email_templates}}".
     *
     * @property integer $id
     * @property string $from
     * @property string $subject
     * @property string $body_html
     * @property string $body_text
     * @property string $var
     */
    public function up()
    {
        $this->createTable('email_template', [
            'id' => $this->primaryKey(),
            'from' => $this->string(),
            'subject' => $this->string(),
            'body_html' => $this->text(),
            'body_text' => $this->text(),
            'var' => $this->string(),
        ]);
        $this->insert('email_template', [
            'from' => 'aaaa@cc.zz',
            'subject' => 'Test',
            'body_html' => 'xxxxx',
            'body_text' => 'ccccc',
            'var' => 'dddddd',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('email_template');
    }
}
