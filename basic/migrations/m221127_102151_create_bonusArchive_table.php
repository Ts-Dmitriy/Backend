<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bonusArchive}}`.
 */
class m221127_102151_create_bonusArchive_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bonusArchive}}', [
            'id_bonus' => $this->primaryKey(),
            'name_bonus'=>$this->String(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%bonusArchive}}');
    }
}
