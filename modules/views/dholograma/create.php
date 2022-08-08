<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dholograma */

$this->title = 'Adicinar  Entrega de Holograma';
$this->params['breadcrumbs'][] = ['label' => 'Dhologramas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dholograma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
