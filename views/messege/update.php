<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Messege */

$this->title = 'Update Messege: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Messeges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="messege-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
