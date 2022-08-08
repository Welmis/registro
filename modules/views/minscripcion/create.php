<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Minscripcion */

$this->title = 'Create Minscripcion';
$this->params['breadcrumbs'][] = ['label' => 'Minscripcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minscripcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
