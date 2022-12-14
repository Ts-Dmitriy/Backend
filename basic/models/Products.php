<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id_product
 * @property string|null $name_product
 * @property int|null $cost
 * @property string|null $description
 * @property int|null $id_subCat
 *
 * @property Orderhistory[] $orderhistories
 * @property Subcategory $subCat
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cost', 'id_subCat'], 'integer'],
            [['name_product', 'description'], 'string', 'max' => 255],
            [['id_subCat'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategory::class, 'targetAttribute' => ['id_subCat' => 'id_subCat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'name_product' => 'Name Product',
            'cost' => 'Cost',
            'description' => 'Description',
            'id_subCat' => 'Id Sub Cat',
        ];
    }

    /**
     * Gets query for [[Orderhistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderhistories()
    {
        return $this->hasMany(Orderhistory::class, ['id_product' => 'id_product']);
    }

    /**
     * Gets query for [[SubCat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubCat()
    {
        return $this->hasOne(Subcategory::class, ['id_subCat' => 'id_subCat']);
    }
}
