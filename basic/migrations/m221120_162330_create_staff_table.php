<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staff}}`.
 */
class m221120_162330_create_staff_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staff}}', [
            'id_staff' => $this->primaryKey(),
            'fullname' => $this->String(255),
            'number'=> $this->Integer(13),
            'role'=>$this->String(255),
            'id_branch'=>$this->Integer(),
        ]);
        $this->createIndex(
            'idx-staff-id_branch',
            'staff',
            'id_branch'
        );

        $this->addForeignKey(
            'fk-staff-id_branch',
            'staff',
            'id_branch',
            'branch',
            'id_branch',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%staff}}');
    }
}
