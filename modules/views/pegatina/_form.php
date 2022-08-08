<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pegatina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pegatina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::className(), 
		[	'options' => ['placeholder' => 'Fecha..'],
			'pluginOptions' => ['autoclose' => true,'format' => 'yyyy-mm-dd',]
		])
	?>

    <?= $form->field($model, 'anno')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
