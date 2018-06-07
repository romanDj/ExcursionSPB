<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\Excursion;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup(){

        $model = new SignupForm();

        if(Yii::$app->request->isPost){

            $file = UploadedFile::getInstance($model,'img');
            $model->load(Yii::$app->request->post());
            $model->setImage($file);

            if($model->signup()){
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', [ 'model' => $model] );

    }

    public function actionTest(){
        $user = User::findOne(1);
        Yii::$app->user->logout();
        if(Yii::$app->user->isGuest){
            echo "Пользователь гость";
        }else{
            echo "Пользователь авторизован";
        }

    }

}
