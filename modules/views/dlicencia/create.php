<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dlicencia */

$this->title = 'Adicinar  Entrega de Licencia';
$this->params['breadcrumbs'][] = ['label' => 'Dlicencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dlicencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
