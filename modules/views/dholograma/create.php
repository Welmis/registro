<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dholograma */

$this->title = 'Adicinar  Entrega de Holograma';
?>
<div class="dholograma-create">

    
    <?= $this->render('_form', [
        'model' => $model,'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
