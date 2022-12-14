<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $fullname
 * @property int $number
 * @property string $password_hash
 * @property string $access_token
 *
 * @property Orderhistory[] $orderhistories
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'number', 'password_hash'], 'required'],
            [['number'], 'integer'],
            [['fullname', 'password_hash', 'access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'fullname' => 'Fullname',
            'number' => 'Number',
            'password_hash' => 'Password Hash',
            'access_token' => 'Access Token',
        ];
    }
    /**
     * @return string
     * @throws \yii\base\Exception
     * Generate token
     */
    public function generateAuthKey(){
        return Yii::$app->security->generateRandomString(255);
    }


     /**
     * @param $password
     * @return string
     * @throws \yii\base\Exception
     * Generate password
     */
    public function setPassword($password){
        return Yii::$app->security->generatePasswordHash($password);

    }
        /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id_user' => $id]);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->andWhere(['access_token'=>$token])->one();
    }
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->access_token;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public static function findByUsername($fullname)
    {
        return static::findOne(['fullname' => $fullname]);
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Gets query for [[Orderhistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderhistories()
    {
        return $this->hasMany(Orderhistory::class, ['id_user' => 'id_user']);
    }
}
