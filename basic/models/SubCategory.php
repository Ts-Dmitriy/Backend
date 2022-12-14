<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subCategory".
 *
 * @property int $id_subCat
 * @property string|null $name_subCat
 * @property int $id_category
 */
class Subcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subCategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category'], 'required'],
            [['id_category'], 'integer'],
            [['name_subCat'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subCat' => 'Id Sub Cat',
            'name_subCat' => 'Name Sub Cat',
            'id_category' => 'Id Category',
        ];
    }
}
