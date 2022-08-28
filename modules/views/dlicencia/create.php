<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dlicencia */

$this->title = 'Adicinar  Entrega de Licencia de Circulación';

?>
<div class="dlicencia-create">

    
    <?= $this->render('_form', [
        'model' => $model, 'modelsModelo' => $modelsModelo,
    ]) ?>

</div>
