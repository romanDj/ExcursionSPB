<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model{

    public $name;

    public $login;

    public $email;

    public $password;

    public $password2;

    public $img;

    public function rules(){

        return [
            [['name', 'login', 'email', 'password', 'password2' ,'img'], 'required'],
            [['name'], 'string'],
            ['name', 'match', 'pattern'=>'/^[а-яА-Я\s]+$/u', 'message' => 'ФИО содержит только кириллицу без знаков препинания'],
            ['password', 'string'],
            ['password', 'match', 'pattern'=>'$^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{6,}$', 'message' => 'Пароль должен содержать не менее 6 символов английской раскладки, верхнего и нижнего регистра'],
            [['email'], 'email'],
            [['login'], 'unique', 'targetClass'=>'app\models\User', 'targetAttribute' => 'login'],
            [['password2'], 'compare', 'compareAttribute' => 'password', 'message'=> 'Пароли должны совпадать'],
            ['img', 'file', 'extensions' => 'png', 'maxSize' => 2048*2048, 'message' => 'Картинка должна быть в формате png и не больше 2Mb']
        ];

    }

    public function signup(){

        if($this->validate()){

            $user = new User();

            $user->attributes = $this->attributes;

            return $user->create();

        }

    }

    public function setImage($img){

        $filename = uniqid().'.'.$img->extension;
        $img->saveAs('uploads/'.$filename);
        $this->img = $filename;
    }


}