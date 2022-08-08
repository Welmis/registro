<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pegatina */

$this->title = 'Create Pegatina';
$this->params['breadcrumbs'][] = ['label' => 'Pegatinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegatina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
