<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\GridView_Messege;

$this->registerJsFile(Constants::HOME_DIR . '/web/js/messege.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
/* @var $this yii\web\View */
/* @var $searchModel app\models\MessegeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel2 app\models\MessegeSearch */
/* @var $dataProvider2 yii\data\ActiveDataProvider */

$this->title = 'Задайте Ваш вопрос';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messege-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  
    // форма - поиск сообщений по тексту или id сообщения
    echo $this->render('_search', [
        'model' => $searchModel,
        ]); 
    ?>
    <?php
// echo"<pre>";
// print_r($arrListAttributes);
// echo"</pre>";
    ?>

<!--     <p>
        <?//= Html::a('Create Messege', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?php
    // форма - задать на вопрос
        echo $this->render('createMessege', [
            'model' => $messegeModel,
            'typeMessege' => Constants::getQuestionValue(),
            'nameTypeMessege' => Constants::getNameTypeMessege(Constants::getQuestionValue()),
            'buttonMessege' => 'Написать вопрос',
        ]);
    ?>
    <?php
    // форма - ответить на вопрос
    if (Yii::$app->user->isGuest != 1){
            echo $this->render('createMessege', [
                'model' => $messegeModel,
                'typeMessege' => Constants::getAnswerValue(),
                'nameTypeMessege' => Constants::getNameTypeMessege(Constants::getAnswerValue()),
                'buttonMessege' => 'Ответить на вопрос',
            ]);
        }
    ?>


    <!-- <button type="button" data-toggle="collapse" data-target="#main-qs-messege" class="feedback-add collapsed btn">
        <span class="pseudo-link">Частые вопросы</span>
    </button> -->
    <!-- <div id="main-qs-messege" class="collapse" aria-expanded="false" style="height: 0px;">
        <?
        //  GridView_Messege::widget([
        //     'dataProvider' => $dataProvider2,
        //     'filterModel' => $searchModel2,
        //     'columns' => [
        //         ['class' => 'yii\grid\SerialColumn'],
        //             'id',
        //             'name',
        //             'email:email',
        //             'messege',
        //             'datemessege',
        //             'typemessege',
        //             'visible',
        //         // 'answer',
        //         // 'dateanswer',
        //         // 'oftenquestion',
        //         // 'normalquestion',
        //         // 'visible',
        //         // 'searchid',

        //         ['class' => 'yii\grid\ActionColumn'],
        //     ],
        // ]); 
        ?>
    </div> -->

    <?php
        // if (Yii::$app->user->isGuest != 1){
        //     echo $this->render('createMessege', [
        //         'model' => $messegeModel2,
        //         'typeMessege' => Constants::getFrequentQuestionValue(),
        //         'nameTypeMessege' => Constants::getNameTypeMessege(Constants::getFrequentQuestionValue()),
        //         'buttonMessege' => 'Частый вопрос написать ',
        //     ]);
        // }
    ?>
    <?php
    // if (Yii::$app->user->isGuest != 1){
    //         echo $this->render('createMessege', [
    //             'model' => $messegeModel2,
    //             'typeMessege' => Constants::getAnswerValue(),
    //             'nameTypeMessege' => Constants::getNameTypeMessege(Constants::getAnswerValue()),
    //             'buttonMessege' => 'Ответить на вопрос',
    //         ]);
    //     }
    ?>

    <!-- List сообщений пользователей -->
    <button type="button" data-toggle="collapse" data-target="#questions-messege" class="feedback-add btn">
        <span class="pseudo-link">Сообщения пользователей</span>
    </button>
    <div id="questions-messege" class="collapse in" aria-expanded="true">
        <?= GridView_Messege::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'name',
                    'email:email',
                    'messege',
                    'datemessege',
                    'typemessege',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>