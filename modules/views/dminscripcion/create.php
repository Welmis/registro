<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dminscripcion */
$this->title = 'Adicinar  Entrega de Modelos de Inspección Técnica';

?>
<div class="dminscripcion-create">

    
    <?= $this->render('_form', [
        'model' => $model,'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
