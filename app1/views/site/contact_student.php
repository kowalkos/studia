<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->registerCssFile("@web/css/contact_student.css");
$this->title = 'Contact student';
$this->params['breadcrumbs'][] = $this->title;
$imie=Yii::$app->user->identity->firstname;
$nazwisko=Yii::$app->user->identity->lastname;

$Logo_UMG=Html::img(Yii::$app->user->identity->zdjecie,array('alt'=>'Zdjecie '.$imie,'width'=>'175px'));
?>
<div class="site-contact-student">
    <h1><?= Html::encode($this->title) ?></h1>
    <div style="float:left;margin-right:30px">
        <?=Html::a($Logo_UMG,Yii::$app->user->identity->link,['target'=>'blank']);?>
         </div>
         <div>
        <p> 
        <?=Html::label('First Name').":".$imie; ?>
        </p>
        <p>
        <?=Html::label('Last Name').":".$nazwisko; ?>
        </p>
        <p>
        <?=Html::label('Faculty').":".Yii::$app->params['faculty']; ?>
        </p>
        <p>
        <?=Html::label('University').":".Yii::$app->params['university']; ?>
        </p>
        <p>
            <?=Html::label('E-mail').":".Html::mailto(Yii::$app->params['e-mail']) ?>
        </p>
        <div>


    <code><?= __FILE__ ?></code>
</div>
