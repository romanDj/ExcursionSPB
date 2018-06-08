<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Список экскурсий';
?>

<div class=" p-3  ">
    Фильтр:
    <a class="btn btn-link p-0 pl-1 pr-1 ml-2" href="<?= Url::toRoute(['/']) ?>">Все</a>
    <a class="btn btn-link p-0 pl-1 pr-1 ml-2" href="<?= Url::toRoute(['/', 'filter'=>'active']) ?>">Активно</a>
    <a class="btn btn-link p-0 pl-1 pr-1 ml-2" href="<?= Url::toRoute(['/', 'filter'=>'passed']) ?>">Прошла</a>
    <a class="btn btn-link p-0 pl-1 pr-1 ml-2" href="<?= Url::toRoute(['/', 'filter'=>'no_place']) ?>">Нет мест</a>
</div>
<hr class="m-0">


<?php foreach ($excursions as $excursion): ?>
    <div class="card-body excursion-block">
        <h3 class="text-left pl-4 mb-3">
            <?= $excursion->name ?>
        </h3>
        <?= Html::img("/uploads/".$excursion->img,['width' => 300,'class' => 'float-right']) ?>
        <p class="description"><?= $excursion->description ?></p>
        <?php if($excursion->place - count($excursion->records) > 0): ?>
            <p class="count-place">Количество свободных мест - <?= $excursion->place - count($excursion->records) ?> чел</p>

            <?php if(!Yii::$app->user->isGuest): ?>
                <?php if($excursion->date > date('Y-m-d')): ?>
                     <a class="btn btn-primary float-right" href="<?= Url::toRoute(['site/record-exc', 'id' => $excursion->id]) ?>">Запись</a>
                <?php else: ?>
                    <button class="btn btn-secondary float-right">Экскурсия уже прошла</button>
                <?php endif; ?>
            <? endif; ?>

        <?php else: ?>
            <p class="count-place">Нет свободных мест</p>
        <?php endif; ?>
        <p class="date"><?= Yii::$app->formatter ->asDate($excursion->date,'long') ?></p>

    </div>
    <hr>
<?php endforeach;  ?>

<?php
echo LinkPager::widget([
        'pagination' => $pagination,
]);
?>

