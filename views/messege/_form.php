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
                'action' => Constants::HOME_DIR . '/web/index.php?r=messege%2Fsubmit_' . Constants::getNameTypeMessege($typeMessege),
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

     <div class="form-header header-primary">
        <h4>
            <i class="fa fa-comments-head-<?= Constants::getNameTypeMessege($typeMessege) ?>"></i>
            <p class="fa"><?= Constants::getNameTypeMessege($typeMessege) ?></p>
        </h4>
    </div>

    <div class="form-body">

        <div class="column-50">

            <? // ТОЛЬКО для администратора для ответов на вопросы
                if (Yii::$app->user->isGuest != 1 && $typeMessege == Constants::getAnswerValue()){
                    echo $form->field($model, 'linkmessegeid')->textInput(['maxlength' => true]);   
                }
            ?>

            <? if ($typeMessege == Constants::getQuestionValue()){ ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <? } ?>

        </div>

    <? if ($typeMessege == Constants::getQuestionValue()){ ?>
        <div class="column-50">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    <? } ?>
        
        <div class="column-100">
            <?= $form->field($model, 'messege')->textarea(['maxlength' => true]) ?>
        </div>

        <? //не виден ни для кого и никогда // заполняется автоматически текущей датой и временем?>
        <?//= $form->field($model, 'datemessege')->hiddenInput(['value' => date("d/m/Y H:i:s")])->label(false); ?>

        <?//$form->field($model, 'linkmessegeid')->hiddenInput()->label(false);  ?>

        <? //для вопроса и ответа разные $typeMessege // не виден ни для кого и никогда?>
        <?= $form->field($model, 'typemessege')->hiddenInput(['value' => $typeMessege])->label(false); ?>

        <!--div class="column-100">
            <?//= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div-->
            <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        

    </div>

    <div class="form-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
