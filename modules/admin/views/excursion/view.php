<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Excursion */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Excursions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excursion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if($model->records): ?>
            <?= Html::button('Нельзя удалить т.к имеются записи', ['class' => 'btn btn-secondary']) ?>
        <?php else: ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => $model->records ? '':  'Are you sure you want to delete this item?',
                    'method' => $model->records ? '': 'post',
                ],

            ]) ?>
        <?php endif; ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'date',
            'place',
            [
                'format' => 'html',
                'attribute' => 'img',
                'value' => function ($model) {
                    return '<img src="/uploads/'.$model->img.'">';
                },
            ]
        ],
    ]) ?>

    <?php if($model->records): ?>
    <table class="table-hover">
        <thead>
            <tr>
                <th><h3>Записавшиеся на экскурсию</h3></th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($model->records as $record): ?>
            <tr>
                <th>
                    <a href="<?= Url::toRoute(['records/view','id' => $record->id]) ?>"><?= $record->user->name ?></a>
                </th>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>





</div>
