<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RecordsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Records', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_user',
                'value' => function ($model) {
                    return $model->user->name;
                },
            ],
            [
                    'attribute' => 'id_excursion',
                'value' => function ($model){
                    return $model->excursion->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
