<?php

use yii\db\Migration;

/**
 * Handles the creation of table `admin`.
 */
class m170610_133740_create_admin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);
        //admin 123456
        $this->insert('admin', [
            'username' => 'admin',
            'auth_key' => '1kizdBhUa1OVkLBm_qNTUbucnyq0l4Tp',
            'password_hash' => '$2y$13$KPypyq5Ldee6gKJCvhSos.NJwtRWOrj7CMh4RdHqjZVdrfotGHU1K',
            'email' => 'admin@test.com',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('admin');
    }
}
