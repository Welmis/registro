<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Holograma */

$this->title = 'Create Holograma';
$this->params['breadcrumbs'][] = ['label' => 'Hologramas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holograma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
