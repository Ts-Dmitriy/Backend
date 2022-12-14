<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderHistory".
 *
 * @property int $id_order
 * @property string|null $date_order
 * @property int $id_user
 * @property int|null $id_product
 * @property int|null $id_staff
 */
class Orderhistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderHistory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_order'], 'safe'],
            [['id_user'], 'required'],
            [['id_user', 'id_product', 'id_staff'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_product' => 'id_product']],
            [['id_staff'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::class, 'targetAttribute' => ['id_staff' => 'id_staff']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'date_order' => 'Date Order',
            'id_user' => 'Id User',
            'id_product' => 'Id Product',
            'id_staff' => 'Id Staff',
        ];
    }
}
