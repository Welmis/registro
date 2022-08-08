<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dminscripcion */
$this->title = 'Adicinar  Entrega de Inscripcion';
$this->params['breadcrumbs'][] = ['label' => 'Dminscripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dminscripcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
