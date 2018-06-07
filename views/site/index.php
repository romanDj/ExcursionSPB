<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Список экскурсий';
?>
<div class="card-body excursion-block">

    <h3 class="text-left pl-4 mb-3">
        Петропавловская крепость
    </h3>
    <img src="img/Panorama_Kazansky.jpg" class="float-right">
    <p class="description">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
    <p class="count-place">Количество мест - 12 чел</p>
    <p class="date">June, 20 , 2018</p>
    <a href="#" class="btn btn-primary float-right">Записаться</a>

</div>
<hr>

<div class="card-body excursion-block">

    <h3 class="text-left pl-4 mb-3">
        Петропавловская крепость
    </h3>
    <img src="img/Panorama_Kazansky.jpg" class="float-right">
    <p class="description">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
    <p class="count-place">Количество мест - 12 чел</p>
    <p class="date">June, 20 , 2018</p>
    <a href="#" class="btn btn-secondary float-right">Запись невозможна т.к. нет свободных мест</a>
</div>
<hr>

<div class="card-body excursion-block">

    <h3 class="text-left pl-4 mb-3">
        Петропавловская крепость
    </h3>
    <img src="img/Panorama_Kazansky.jpg" class="float-right">
    <p class="description">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>
    <p class="count-place">Количество мест - 12 чел</p>
    <p class="date">June, 20 , 2018</p>
    <a href="#" class="btn btn-secondary float-right">Запись невозможна т.к. нет свободных мест</a>
</div>


<?php foreach ($excursions as $excursion): ?>
    <div class="card-body excursion-block">
        <h3 class="text-left pl-4 mb-3">
            <?= $excursion->name ?>
        </h3>
        <?= Html::img("/uploads/".$excursion->img,['height' => 100,'class' => 'float-right']) ?>
        <p class="description"><?= $excursion->description ?></p>
        <p class="count-place">Количество мест - <?= $excursion->place ?> чел</p>
        <p class="date"><?= Yii::$app->formatter ->asDate($excursion->date,'long') ?></p>
        <a class="btn btn-primary float-right" href="http://www.yiiframework.com/doc/">Запись</a>
    </div>
    <hr>
<?php endforeach;  ?>

<?php
echo LinkPager::widget([
        'pagination' => $pagination,
]);
?>

