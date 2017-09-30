<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\Menu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logoped.png', ['alt'=>Yii::$app->name]),//'./img/logoped.png',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse ',//navbar-toggleable-md navbar-light bg-faded', /*navbar-fixed-top*/
            // 'style' => 'border-radius:0px'
        ],
    ]);

    $itemsMenu = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Country', 'url' => ['/country/index']],
            ['label' => 'Massage', 'url' => ['/messege/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login'], 'options' => ['class' => 'display_none']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ];

    // echo Menu::widget([
        // 'options' => ['class' => 'navbar-nav navbar-right nav mobil'],
        // 'items' => $itemsMenu,
    // ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav mobil'],
        'items' => $itemsMenu,
    ]);
    NavBar::end();
    ?>

<!--     <div id="header-bar">
         <div class="navbar-header">
            <a class="" href="<?= Yii::$app->homeUrl ?>"><img src="./img/logoped.png"></a>
        </div>
    </div> -->

    <div id="align">
        <div class="content">
            <div class="container-navbar">
                <?/*= Menu::widget([
                    'options' => ['class' => 'nav desc', 'id' => 'navbar-desc'],//navbar-nav navbar-right 
                    'items' => $itemsMenu,
                ]); */?>
 <!--    <ul id="navbar-dummy" class="nav desc">
        <li><a>Home</a></li>
        <li><a>About</a></li>
        <li><a>Contact</a></li>
        <li><a>Country</a></li>
        <li><a>Massage</a></li>
    </ul> -->
<?
    echo Nav::widget([
        'options' => ['class' => 'nav desc', 'id' => 'navbar-desc'],
        'items' => $itemsMenu,
    ]);

    echo Nav::widget([
        'options' => ['class' => 'nav desc', 'id' => 'navbar-scroller'],
        'items' => $itemsMenu,
    ]);


?>

            </div>


            <?/*= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) */?>
            <?= $content ?>
        </div>
    </div>
</div>
<div id="menu-scroller" class="desc"></div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <div id="scrollUp" class="scroller"></div>
        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
