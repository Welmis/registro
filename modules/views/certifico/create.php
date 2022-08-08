<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Certifico */

$this->title = 'Create Certifico';
$this->params['breadcrumbs'][] = ['label' => 'Certificos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certifico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
