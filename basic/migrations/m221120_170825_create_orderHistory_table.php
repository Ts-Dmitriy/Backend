<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orderHistory}}`.
 */
class m221120_170825_create_orderHistory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orderHistory}}', [
            'id_order' => $this->primaryKey(),
            'date_order'=>$this->Date(),
            'id_user'=>$this->Integer()->notNULL(),
            'id_product'=>$this->Integer(),
            'id_staff'=>$this->Integer(),
        ]);
        $this->createIndex(
            'idx-orderHistory-id_user',
            'orderHistory',
            'id_user'
        );

        $this->addForeignKey(
            'fk-orderHistory-id_user',
            'orderHistory',
            'id_user',
            'users',
            'id_user',
            'CASCADE'
        );
        $this->createIndex(
            'idx-orderHistory-id_product',
            'orderHistory',
            'id_product'
        );

        $this->addForeignKey(
            'fk-orderHistory-id_product',
            'orderHistory',
            'id_product',
            'products',
            'id_product',
            'CASCADE'
        );
        $this->createIndex(
            'idx-orderHistory-id_staff',
            'orderHistory',
            'id_staff'
        );

        $this->addForeignKey(
            'fk-orderHistory-id_staff',
            'orderHistory',
            'id_staff',
            'staff',
            'id_staff',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orderHistory}}');
    }
}
