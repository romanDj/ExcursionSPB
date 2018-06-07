<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Records */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="records-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_excursion')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
