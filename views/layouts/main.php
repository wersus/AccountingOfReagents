<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'Reagents'),
                'url' => ['/reagents'],
                'items' => [
                        ['label' => Yii::t('app', 'Reagents'), 'url' => ['/reagents']],
                        ['label' => Yii::t('app', 'Act Of Renewal Reagents'), 'url' => ['/act-of-renewal-reagents']],
                        ['label' => Yii::t('app', 'Concentrations'), 'url' => ['/concentrations']],
                        ['label' => Yii::t('app', 'External Reagents'), 'url' => ['/external-reagents']],
                        ['label' => Yii::t('app', 'Internal Solutions'), 'url' => ['/internal-solutions']],
                        ['label' => Yii::t('app', 'Methods'), 'url' => ['/methods']],
                        ['label' => Yii::t('app', 'Qualifications'), 'url' => ['/qualifications']],
                        ['label' => Yii::t('app', 'Manufacturers'), 'url' => ['/manufacturers']],
                        ['label' => Yii::t('app', 'Measurements'), 'url' => ['/measurements']],
                        ['label' => Yii::t('app', 'Shelf Lifes'), 'url' => ['/shelf-lifes']],
                        ['label' => Yii::t('app', 'Solutions'), 'url' => ['/solutions']],
                        ['label' => Yii::t('app', 'Write Offs'), 'url' => ['/write-offs']],
                        ['label' => Yii::t('app', 'Shelf Lifes'), 'url' => ['/shelf-lifes']],
                        ['label' => Yii::t('app', 'Shelf Lifes'), 'url' => ['/shelf-lifes']],
                ]
            ],
            ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
            ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; NO Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
