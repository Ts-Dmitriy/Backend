<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bonus}}`.
 */
class m221120_171031_create_bonus_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bonus}}', [
            'id_bonus' => $this->primaryKey(),
            'bonus_name' => $this->String(255),
            'amount'=> $this->Integer(),
            'id_order'=>$this->Integer(),
        ]);
        $this->createIndex(
            'idx-bonus-id_order',
            'bonus',
            'id_order'
        );

        $this->addForeignKey(
            'fk-bonus-id_order',
            'bonus',
            'id_order',
            'orderHistory',
            'id_order',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bonus}}');
    }
}
