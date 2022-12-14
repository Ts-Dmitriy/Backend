<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categoryProduct}}`.
 */
class m221120_154812_create_categoryProduct_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categoryProduct}}', [
            'id_category' => $this->primaryKey(),
            'name_category'=>$this->String(255),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categoryProduct}}');
    }
}
