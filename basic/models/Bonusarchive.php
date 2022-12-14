<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bonusArchive".
 *
 * @property int $id_bonus
 * @property string|null $name_bonus
 * 
 * @property Bonus $bonus
 */
class Bonusarchive extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bonusArchive';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_bonus'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bonus' => 'Id Bonus',
            'name_bonus' => 'Name Bonus',
        ];
    }

            /**
     * Gets query for [[Bonus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBonusarchive()
    {
        return $this->hasOne(Bonus::class, ['id_bonus' => 'id_bonus']);
    }
}
