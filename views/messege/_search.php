<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MessegeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messege-search-add-wrap">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <? if (Yii::$app->user->isGuest != 1){ ?>
        <?= $form->field($model, 'searchid') ?>
    <? } ?>

    <?= $form->field($model, 'messege')->textInput()?>

    <!-- <div class="form-group"> -->
        <?= Html::submitButton('Search', 
            ['class' => 'btn btn-primary',
            'id' => 'search-btn-primary']) ?>
        <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    <!-- </div> -->

    <?php ActiveForm::end(); ?>

</div>
