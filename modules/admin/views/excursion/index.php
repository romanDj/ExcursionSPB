<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ExcursionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Excursions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excursion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Excursion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
            [
                'attribute' => 'date',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->date, 'long');
                }
            ],
            [
                'attribute' => 'place',
                'value' => function ($model) {
                    return $model->place.' мест';
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'img',
                'value' => function($model) {
//                    return '<img src="/uploads/'.$model->img.'">';
                    return Html::img("/uploads/".$model->img,['height' => 100,'class' => 'admin-img']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</div>
