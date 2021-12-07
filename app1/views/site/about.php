<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Witaj';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        To jest moja pierwsza nowa strona tej aplikacji
    </p>

    <code><?= __FILE__ ?></code>
</div>
