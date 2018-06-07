<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $email
 * @property string $password
 * @property string $img
 *
 * @property Records[] $records
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img'], 'string'],
            [['name', 'login', 'email', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'login' => 'Login',
            'email' => 'Email',
            'password' => 'Password',
            'img' => 'Img',
        ];
    }


    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['id_user' => 'id']);
    }


    public static function findIdentity($id)
    {
        return User::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }


    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static  function findByUsername($username){
        return User::find()->where(['login'=>$username])->one();
    }

    public function  validatePassword($password){
        if($this->password == $password){
            return true;
        }else{
            return false;
        }
    }

    public function create(){
        return $this->save(false);
    }

}
