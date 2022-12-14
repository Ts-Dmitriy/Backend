<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m221120_161638_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id_product' => $this->primaryKey(),
            'name_product'=>$this->String(255),
            'cost'=>$this->Integer(),
            'description'=>$this->String(255),
            'id_subCat'=>$this->Integer(),
        ]);
        $this->createIndex(
            'idx-products-id_subCat',
            'products',
            'id_subCat'
        );

        $this->addForeignKey(
            'fk-products-id_subCat',
            'products',
            'id_subCat',
            'subCategory',
            'id_subCat',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
