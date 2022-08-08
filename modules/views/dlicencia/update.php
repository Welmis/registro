<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dlicencia */

$this->title = 'Update Dlicencia: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dlicencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dlicencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
