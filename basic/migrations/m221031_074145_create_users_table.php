<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221031_074145_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id_user' => $this->primaryKey()->notNull(),
            'fullname' => $this->String(255)->notNull(),
            'number'=> $this->Integer(13)->notNull(),
            'password_hash' => $this->string(255)->notNull(),
            'access_token' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
