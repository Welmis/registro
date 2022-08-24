<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Holograma */

$this->title = 'Create Holograma';

?>
<div class="holograma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
