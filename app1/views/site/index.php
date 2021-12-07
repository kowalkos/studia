<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
.tekst{
    text-align:center;
}

</style>
<div class="site-index">
 <div class="tekst"><?= Yii::$app->user->identity==null ? ('Welcome Guest' ):(
      'Welcome '.Yii::$app->user->identity->username) ?> </div>
</div>