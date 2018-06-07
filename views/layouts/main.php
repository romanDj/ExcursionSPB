<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PublicAsset;
use yii\helpers\Url;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">

    <div class="bgImg ten">
        <h1 class="p-4 m-0 text-light">Экскурсии по Санкт-Петербургу</h1>
    </div>
    <nav class="navbar ten navbar-expand-lg navbar-light bg-light mb-3">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../">Список экскурсий</a>
                </li>


                <?php if(Yii::$app->user->isGuest): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute(['auth/login']) ?>">Авторизация</a>
                    </li>
                <?php else: ?>
                    <?= Html::beginForm(['/auth/logout'],'post')
                    . Html::submitButton(
                            'Выйти, '.Yii::$app->user->identity->name,
                            ['class' => 'bg-white  border-right-0  border-top-0 border-bottom-0 nav-link text-danger border-left']
                    )
                    .Html::endForm() ?>
                <?php endif; ?>



            </ul>
        </div>
    </nav>

    <div class="card ten  rounded-0 border-0 mb-4">


       <?= $content ?>

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
