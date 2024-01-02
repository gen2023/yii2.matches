<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
        'innerContainerOptions'=>['class'=>'navTop']
    ]); ?>

    <ul class="hList">
        <li>
            <a href="/main/index" class="menu">
            <span class="menu-title">Home</span>
            </a>
        </li>
        <li>
            <a href="/admin/category/index" class="menu">
            <span class="menu-title menu-title_2nd">Category</span>
            </a>
        </li>
        <li>
            <a href="/admin/gallery/index" class="menu">
            <span class="menu-title menu-title_5">Gallery</span>
            </a>
        </li>
        <li>
            <a href="/admin/slogan/index" class="menu">
            <span class="menu-title menu-title_4th">Slogan</span>
            </a>
        </li>        
        <li>
            <?php echo Html::beginForm(['/main/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'menu menu-title menu-title_3rd logout']
                )
                . Html::endForm() ?>
        </li>
    </ul>   
    <?php NavBar::end(); ?> 
</header>

<main role="main" class="flex-shrink-0">
    <div class="myContainer">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="myContainer">
        <p class="float-left">&copy; <?= Yii::$app->name; ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
