<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bonus".
 *
 * @property int $id_bonusOrder
 * @property int|null $id_bonus
 * @property int|null $amount
 * @property int|null $id_order
 *
 * @property Orderhistory $order
 * 
 * @property Bonusarchive $bonusarchive
 */
class Bonus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bonus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bonus','amount', 'id_order'], 'integer'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Orderhistory::class, 'targetAttribute' => ['id_order' => 'id_order']],
            [['id_bonus'], 'exist', 'skipOnError' => true, 'targetClass' => Bonusarchive::class, 'targetAttribute' => ['id_bonus' => 'id_bonus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bonusOrder' => 'Id Bonus Order',
            'id_bonus' => 'Id Bonus',
            'amount' => 'Amount',
            'id_order' => 'Id Order',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orderhistory::class, ['id_order' => 'id_order']);
    }
    
        /**
     * Gets query for [[Bonusarchive]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBonusarchive()
    {
        return $this->hasOne(Bonusarchive::class, ['id_bonus' => 'id_bonus']);
    }
}
