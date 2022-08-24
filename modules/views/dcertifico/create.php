<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcertifico */

$this->title = 'Adicinar  Entrega de  Certificados de Inspección de Vehiculos';
$this->params['breadcrumbs'][] = ['label' => 'Certificados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcertifico-create">


    <?= $this->render('_form', [
        'model' => $model,'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
