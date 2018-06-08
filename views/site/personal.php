<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Личный кабинет';
?>




<div class="card-body">
    <?php foreach(Yii::$app->session->getAllFlashes() as $type => $messages): ?>
        <?php foreach($messages as $message): ?>
            <div class="alert alert-<?= $type ?>" role="alert"><?= $message ?></div>
        <?php endforeach ?>
    <?php endforeach ?>

    <h3 class="text-left ml-3 mb-3">
        Личный кабинет
    </h3>
    <div class="col-md-8">
        <?= Html::img("/uploads/".Yii::$app->user->identity->img, ['height' => 120, 'alt' => 'нет фотографии', 'class' => 'mr-3 float-left border-secondary rounded border']) ?>
        <h5>Имя: <?= Yii::$app->user->identity->name ?></h5>
        <h5>Логин: <?= Yii::$app->user->identity->login ?></h5>
        <h5>Почта: <?= Yii::$app->user->identity->email ?></h5>
    </div>
    <br>
    <?php if($myexcursion->excursion): ?>
    <hr>
    <h4 class="text-center mb-3">
        Записи на экскурсии
    </h4>

    <?php foreach ($myexcursion->excursion as $exc): ?>

        <div class="alert alert-success">
            <h5 class="text-left mb-3">
                <?= $exc->name ?>
            </h5>
            <p><?= Yii::$app->formatter ->asDate($exc->date,'long') ?></p>
        </div>


    <?php endforeach; ?>

    <? else:?>
        <hr>
        <h4 class="text-center mb-3">
            Нет текущих записей на экскурсию
        </h4>
    <?php endif; ?>
</div>



