<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Messege */
?>
<!-- <div id="tab-feedback">
    <div class="feedback-add-wrap">

        <button type="button" data-toggle="collapse" data-target="#feedback-add-form" class="feedback-add collapsed btn">
            <span class="pseudo-link">OPEN</span>
        </button>

        <form action="#" method="post" class="feedback-add-form collapse" id="feedback-add-form">
            <?php 
            // $this->title = 'Create Messege';
            // $this->params['breadcrumbs'][] = ['label' => 'Messeges', 'url' => ['index']];
            // $this->params['breadcrumbs'][] = $this->title;
            ?>
            <?//= $this->render('/messege/_form', [
               // 'model' => $model,
          //  ]) ?>
            <p>123</p>
        </form>

    </div> -->
<?php
foreach ($model as $key) {

    // print_r($key);
    $id = 'Id: ' . $key["id"];
    $name = 'Автор: ' . $key["name"];
    $date =  $key["datemessege"];
    $messege = $key["messege"];
    $typemessege = $key["typemessege"];
    if($messege != "empty")
    {

    // $visible = $key["visible"];
    // $this->params['breadcrumbs'][] = ['label' => 'Messeges', 'url' => ['index']];
    // $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
    // $this->params['breadcrumbs'][] = 'Update';
    // echo $name;
    // echo $date;
    // echo $question;

    // if($visible == 1){
?>
<!-- <ul class="older">
  <li><a href="#">Элемент списка</a></li>
  <li><a href="#">Элемент списка</a></li>
  <li><a href="#">Элемент списка</a></li>
  <li><a href="#">Элемент списка</a></li>
  <li><a href="#">Элемент списка</a></li>
</ul> -->
        <div class="feedback-item <?= Constants::getNameTypeMessege($typemessege) ?>">

            <div class="feedback-header">

                <!-- <div class="autorec"> -->
                    <p>
                        <? 
                            if($typemessege == Constants::QUESTION)
                            {
                                echo Html::encode($name);
                            }
                            else if($typemessege == Constants::ANSWER) 
                            {
                                echo Html::encode("Ответ");
                            }
                        ?>
                    </p> 
                    <? if (Yii::$app->user->isGuest != 1){ ?>
                        <p>
                            <?= Html::encode($id); ?>  
                        </p> 
                    <? } ?>
                    <!-- <font size="1"> -->
                        <p>
                            <?= Html::encode($date); ?>
                        </p>
                    <!-- </font> -->
                <!-- </div>  -->
                
            </div>

            <div class="feedback-body">
                <p>
                  <?= Html::encode($messege); ?>
                </p>
            </div>

        </div>

    <!-- https://ruseller.com/lessons.php?id=895&rub=2 -->

    <!-- <div class="dispari">

        <div class="bigNumber">
            1 
        </div>
        <div class="theComment">
            <div class="autorec">
                Автор: 
                <a href="http://www.deerchat.ru" rel="external nofollow" class="url">Влад</a> 
                <font size="1">
                    <a href="#comment-298" title="">28th Август 2011 - 12:18</a>
                </font>
            </div> 
            <p>)</p>

        </div> 
    </div> -->





<?php
    }
}
?>

</div>