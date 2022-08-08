<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dpegatina */

$this->title = 'Adicinar  Entrega de Pegatina';
$this->params['breadcrumbs'][] = ['label' => 'Dpegatinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dpegatina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
