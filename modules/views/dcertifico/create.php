<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcertifico */

$this->title = 'Adicinar  Entrega de  Certificados de Inspección de Vehiculos';

?>
<div class="dcertifico-create">


    <?= $this->render('_form', [
        'model' => $model,'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
