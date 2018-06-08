<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\Excursion;
use app\models\Records;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($filter = 'all')
    {
        $query = Excursion::find();

        if($filter == 'active'){
            $query = Excursion::find()->where("date > curdate()");
        }elseif ($filter == 'no_place'){
            $query = Excursion::find()
                ->joinWith('records')
                ->groupBy('excursion.id')
                ->having('COUNT(records.id) = excursion.place ');
        }elseif ($filter == 'passed'){
            $query = Excursion::find()->where("date < curdate()");
        }

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 3 ]);

        $excursions = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', ['excursions' => $excursions, 'pagination' => $pagination ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSay($message = 'Привет'){
        return $this->render('say', ['message' => $message]);
    }

    public function actionEntry(){
        $model = new EntryForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            return  $this->render('entry-confirm', ['model' => $model]);
        }else{
            return  $this->render('entry', ['model' => $model]);
        }

    }

    public function actionRecordExc($id){
        $num = Records::find()->where(['id_excursion'=>$id])->andWhere( ['id_user' => Yii::$app->user->identity->id])->one();

        if(count($num) != 0){

            Yii::$app->session->addFlash('info', 'Вы уже записаны на эту экскурсию.');

        }else{

            Records::createRecord($id);
            Yii::$app->session->addFlash('info', 'Вы успешно записались на экскурсию #'. $id);

        }

        return $this->redirect(['site/personal']);
    }

    public function actionPersonal(){

        $us = User::findOne(['id' => Yii::$app->user->identity->id]);
        return $this->render('personal', ['myexcursion' => $us]);

    }
}
