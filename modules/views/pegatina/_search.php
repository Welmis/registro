<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\searchs\PegatinaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegatina-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'serial') ?>

    <?= $form->field($model, 'destino') ?>

    <?= $form->field($model, 'obs') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'anno') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
