<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id_staff
 * @property string|null $fullname
 * @property int|null $number
 * @property string|null $role
 * @property int|null $id_branch
 *
 * @property Branch $branch
 * @property Orderhistory[] $orderhistories
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'id_branch'], 'integer'],
            [['fullname', 'role'], 'string', 'max' => 255],
            [['id_branch'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::class, 'targetAttribute' => ['id_branch' => 'id_branch']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_staff' => 'Id Staff',
            'fullname' => 'Fullname',
            'number' => 'Number',
            'role' => 'Role',
            'id_branch' => 'Id Branch',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::class, ['id_branch' => 'id_branch']);
    }

    /**
     * Gets query for [[Orderhistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderhistories()
    {
        return $this->hasMany(Orderhistory::class, ['id_staff' => 'id_staff']);
    }
}
