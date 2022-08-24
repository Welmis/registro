<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dminscripcion */
$this->title = 'Adicinar  Entrega de Inscripcion de Vehiculos';

?>
<div class="dminscripcion-create">

    
    <?= $this->render('_form', [
        'model' => $model,'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
