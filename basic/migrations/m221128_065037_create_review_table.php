<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m221128_065037_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id_review' => $this->primaryKey(),
            'id_user'=> $this->Integer(13)->notNull(),
            'message'=> $this->String(255)->notNULL(),
            'file'=>$this->String(255)
        ]);
        $this->createIndex(
            'idx-review-id_user',
            'review',
            'id_user'
        );

        $this->addForeignKey(
            'fk-review-id_user',
            'review',
            'id_user',
            'users',
            'id_user',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
