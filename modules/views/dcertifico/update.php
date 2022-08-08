<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcertifico */

$this->title = 'Update Dcertifico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dcertificos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dcertifico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
