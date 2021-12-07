<?php

/* @var $this \yii\web\View */
/* @var $content string */

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
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index'], 'visible'=>Yii::$app->user->isGuest ||Yii::$app->user->identity->grupa=='admin'||Yii::$app->user->identity->username=='student'],
            !Yii::$app->user->isGuest?(
                Yii::$app->user->identity->username=='adam'?(
                    ['label' => 'About '.Yii::$app->user->identity->firstname , 'url' => ['/site/about_adam'],'visible'=>true])
            :("")):(""),
            !Yii::$app->user->isGuest?(
                Yii::$app->user->identity->username=='iwona'?(
                    ['label' => 'About '.Yii::$app->user->identity->firstname , 'url' => ['/site/about_iwona'],'visible'=>true])
            :("")):(""),
            //['label' => 'Contact Student', 'url' => ['/site/contact_student'],'visible'=>!Yii::$app->user->isGuest&&Yii::$app->user->identity->username=='student'],
            //['label' => 'Contact', 'url' => ['/site/contact'], 'visible'=>!Yii::$app->user->isGuest&&Yii::$app->user->identity->username=='student'||Yii::$app->user->identity->username=='admin'],
            !Yii::$app->user->isGuest? (
                Yii::$app->user->identity->username=='adam'?
                (
                    ['label' => 'Contact Adam', 'url' => ['/site/contact_adam'], 'visible'=>true]
                ):(Yii::$app->user->identity->username=='iwona'?(
                    ['label' => 'Contact Iwona', 'url' => ['/site/contact_iwona'], 'visible'=>true]
                ):(Yii::$app->user->identity->grupa=='student'||Yii::$app->user->identity->grupa=='admin'?(
                    ['label' => 'Contact', 'url' => ['/site/contact'], 'visible'=>true]
                ):('')))):("")
                ,
            
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();

    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; Student application - developed in GMU <?= date('Y') ?></p>
        <p class="float-left"><?= Yii::$app->params['university'];?> </p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
