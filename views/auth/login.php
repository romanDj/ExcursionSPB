<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-body">
    <div class="row justify-content-center">




    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'options' => ['class' => 'col-md-4'],
        'fieldConfig' => [
            'template' => "<div class=\"form-group\">{label}\n{input}</div>\n<div>{error}</div>",
            'labelOptions' => ['class' => 'w-100'],
            'errorOptions' => ['class' => 'text-danger']
        ],
    ]); ?>
        <h4 class="text-center"><?= Html::encode($this->title) ?></h4>


        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Логин:') ?>

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль:') ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"w-100\">{input} {label}</div>\n<div class=\"w-100\">{error}</div>",
        ]) ?>

        <a href="<?= Url::toRoute(['auth/signup']) ?>">Регистрация</a>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-success float-right', 'name' => 'login-button']) ?>
    <?php ActiveForm::end(); ?>

    </div>
</div>
