<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MessegeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messege-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'searchid') ?>

    <?= $form->field($model, 'messege') ?>

    <?//= $form->field($model, 'email') ?>

    <?//= $form->field($model, 'question') ?>

    <?//= $form->field($model, 'datequestion') ?>

    <?php // echo $form->field($model, 'answer') ?>

    <?php // echo $form->field($model, 'dateanswer') ?>

    <?php // echo $form->field($model, 'oftenquestion') ?>

    <?php // echo $form->field($model, 'normalquestion') ?>

    <?php // echo $form->field($model, 'visible') ?>

    <?php // echo $form->field($model, 'searchid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
