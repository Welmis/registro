<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dminscripcion */

$this->title = 'Update Dminscripcion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dminscripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dminscripcion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
