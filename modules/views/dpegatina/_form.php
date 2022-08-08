<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Destino;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Dcertifico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dcertifico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'siglas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_inicial')->textInput() ?>

   <?= $form->field($model, 'cant')->textInput() ?>

    <?= $form->field($model, 'fecha')->widget(DatePicker::className(), 
		[	'options' => ['placeholder' => 'Fecha..'],
			'pluginOptions' => ['autoclose' => true,'format' => 'yyyy-mm-dd',]
		])
	?>

   <?= $form->field($model, 'destino')->dropDownList(ArrayHelper::map(Destino::find()->all(), 'nombre', 'nombre'),['prompt'=>'Por favor elija uno']); ?>
	<?= $form->field($model, 'anno')->textInput(['type' => 'number','min'=>2000,'max'=>2030]) ?>

    <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
