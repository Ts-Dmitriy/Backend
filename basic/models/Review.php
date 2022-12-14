<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;




/**
 * This is the model class for table "review".
 *
 * @property int $id_review
 * @property int $id_user
 * @property string|null $imageFile
 *
 * @property Users $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile[]
    */



    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'review';
    }




    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_review' => 'Id Review',
            'id_user' => 'Id User',
            'imageFile' => 'Image File',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id_user' => 'id_user']);
    }


    public function upload(){
    if ($this->validate())  {
       
        $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
        return true;
    } else {
        return false;

    }
}
}