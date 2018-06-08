<?php

namespace app\modules\admin\controllers;


use app\models\User;
use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $users = User::find();
        return $this->render('index',['user'=>$users]);
    }
}
