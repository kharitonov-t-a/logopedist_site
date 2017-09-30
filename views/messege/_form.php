<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Messege */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messege-form">

    <?php 
        if (!isset($createFromMain) || $createFromMain != true) {
            $form = ActiveForm::begin([
                'id' => 'feedback-add-form',
            ]);
        }else{

            $propsAddFormMessege = [
                'action' => '/basic/web/index.php?r=messege%2Fsubmit',
                'options' => [
                    'class' => 'form-inline collapse',
                    'aria-expanded' => 'false',
                    'style' => 'height: 0px;'
                ]
            ];

            // if($typeMessege == Constants::getQuestionValue()){
            //     $propsAddFormMessege['id'] = 'question-add-form';
            // }elseif($typeMessege == Constants::getAnswerValue()){
            //     $propsAddFormMessege['id'] = 'answer-add-form';
            // }elseif($typeMessege == Constants::getFrequentQuestionValue()){
            //     $propsAddFormMessege['id'] = 'frequent-add-form';
            // }
            $propsAddFormMessege['id'] = Constants::getNameTypeMessege($typeMessege) . "-add-form";

            $form = ActiveForm::begin($propsAddFormMessege);

        }
     ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'messege')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datemessege')->textInput() ?>

    <?= $form->field($model, 'linkmessegeid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
