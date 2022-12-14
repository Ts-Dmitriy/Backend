<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subCategory}}`.
 */
class m221120_155945_create_subCategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subCategory}}', [
            'id_subCat' => $this->primaryKey(),
            'name_subCat'=>$this->String(255),
            'id_category'=>$this->Integer()->notNULL(),
        ]);

        $this->createIndex(
            'idx-subCategory-id_category',
            'subCategory',
            'id_category'
        );

        $this->addForeignKey(
            'fk-subCategory-id_category',
            'subCategory',
            'id_category',
            'categoryProduct',
            'id_category',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subCategory}}');
    }
}
