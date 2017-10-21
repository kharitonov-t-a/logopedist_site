<?php
use Yii;
use yii\helpers\Html;	
use yii\grid\GridView;
use app\widgets\GridView_Messege;

// require_once 'basic/web/php/Constants.php';

// $this->registerFile('/basic/web/php/Constants.php');// namespace app\models;


// use yii\base\Model;
// use yii\data\ActiveDataProvider;
// use app\models\Messege;
// use \basic\web\php\Constants;

/* @var $this yii\web\View */
/* @var $model app\models\Messege */
// $this->title = 'Create Messege';
$this->params['breadcrumbs'][] = ['label' => 'Messeges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="feedback-add-wrap">

        <button type="button" data-toggle="collapse" data-target="#<?=$nameTypeMessege ?>-add-form" class="feedback-add collapsed btn">
            <span class="pseudo-link">
                <?php 
                    echo $buttonMessege;
                ?>
            </span>
        </button>

        <?= $this->render('/messege/_form', [
            'model' => $model,
            'createFromMain' => true,
            'typeMessege' => $typeMessege,
        ]) ?>

    </div>