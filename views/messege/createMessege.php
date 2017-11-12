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
            <span id = "<?=$nameTypeMessege ?>-add-span" class="pseudo-link">
                <?php 
                    echo $buttonMessege;
                ?>
            </span>
        </button>

        <button type="button" data-toggle="collapse" data-target="#questions-messege" class="feedback-add btn">
            <span id = "questions-messege-span" class="pseudo-link">Скрыть сообщения пользователей</span>
        </button>

        <?= $this->render('/messege/_form', [
            'model' => $model,
            'createFromMain' => true,
            'typeMessege' => $typeMessege,
        ]) ?>


<!--          <div id="questions-help">
                <p>
                    Suspendisse accumsan dignissim sem. Curabitur at felis aliquet, varius sapien nec, rhoncus purus. Pellentesque porta nunc accumsan lorem commodo cursus. Suspendisse in nibh semper, finibus orci eget, dignissim urna. Nam dignissim scelerisque arcu eget rhoncus. Proin in quam risus. Aenean imperdiet malesuada elit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut viverra, sem eget semper suscipit, sem enim tincidunt risus, vitae suscipit tortor orci et lacus. Fusce cursus lacus in turpis euismod sodales. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                </p>
         </div> -->


    </div>