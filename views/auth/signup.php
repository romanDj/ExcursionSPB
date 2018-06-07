<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-body">
    <div class="row justify-content-center">




        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'options' => ['class' => 'col-md-5'],
            'fieldConfig' => [
                'template' => "<div class=\"form-group\">{label}\n{input}</div>\n<div>{error}</div>",
                'labelOptions' => ['class' => 'w-100'],
                'errorOptions' => ['class' => 'text-danger']
            ],
        ]); ?>
        <h4 class="text-center"><?= Html::encode($this->title) ?></h4>


        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('ФИО:') ?>

        <?= $form->field($model, 'login')->textInput(['autofocus' => true])->label('Логин:') ?>

        <?= $form->field($model, 'email')->textInput()->label('Email:') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль:') ?>

        <?= $form->field($model, 'password2')->passwordInput()->label('Подтверждение пароля:') ?>

        <?= $form->field($model, 'img')->fileInput(['autofocus' => true])->label('Изображение:') ?>





        <a href="<?= Url::toRoute('auth/login') ?>">Уже есть аккаунт</a>
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success float-right', 'name' => 'login-button']) ?>
        <?php ActiveForm::end(); ?>

    </div>
</div>
