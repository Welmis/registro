<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dcertifico */

$this->title = 'Adicinar  Entrega de  Certificado de Inspección';
$this->params['breadcrumbs'][] = ['label' => 'certificos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcertifico-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
