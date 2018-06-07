<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Excursion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="excursion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название экскурсии') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'place')->textInput() ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
