<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Destino;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Dcertifico */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="dcertifico-form">


     <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
	<div class="row">
<div class="col-md-3">
	<?= $form->field($model, 'fecha')->widget(DatePicker::className(), 
		[	'options' => ['placeholder' => 'Fecha..'],
			'pluginOptions' => ['autoclose' => true,'format' => 'yyyy-mm-dd',]
		])
	?>
	</div>
	<div class="col-md-3">
	
	<?= $form->field($model, 'destino')->dropDownList(ArrayHelper::map(Destino::find()->all(), 'nombre', 'nombre'),['prompt'=>'Por favor elija uno',]); ?>
</div>
<div class="col-md-6">
	
	 <?= $form->field($model, 'obs')->textInput(['maxlength' => true]) ?>
</div>
                        
</div>
   

    

  
   
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.container-items',
        'widgetItem' => '.Modelo-item',
        'limit' => 10,
        'min' => 1,
        'insertButton' => '.add-Modelo',
        'deleteButton' => '.remove-Modelo',
        'model' => $modelsModelo[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'description',
        ],
    ]); ?>
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Conceptos Asociados </th>
                
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-Modelo btn btn-success btn-xs"><span class="fa fa-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
		<tr>
                <td class="vcenter">
                   Siglas
                </td>
				
				<td class="vcenter">
                  Numero Inicial </td><td class="vcenter">
Cantidad de modelos</td>
				<td class="vcenter">
                  obs
                </td>
				</tr>
        <?php foreach ($modelsModelo as $indexModelo => $modelModelo): ?>
            <tr class="Modelo-item">
                <td class="vcenter">
                    <?php
                        // necessary for update action.
                        if (! $modelModelo->isNewRecord) {
                            echo Html::activeHiddenInput($modelModelo, "[{$indexModelo}]id");
                        }
                    ?>
                   
                   <?= $form->field($modelModelo, "[{$indexModelo}]siglas")->label(false)->textInput(['maxlength' => true]) ?>
                </td>
				
				<td class="vcenter">
                   <?= $form->field($modelModelo, "[{$indexModelo}]num_inicial")->label(false)->textInput(['maxlength' => true]) ?>
                </td>
				<td class="vcenter">
                   <?= $form->field($modelModelo, "[{$indexModelo}]cant")->label(false)->dropDownList([ 4999 => '4999',  249 => '249', 499 => '499', 999 => '999']);?>
                </td>
				<td class="vcenter">
                   <?= $form->field($modelModelo, "[{$indexModelo}]obs")->label(false)->textInput(['maxlength' => true]) ?>
                </td>
				             
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-Modelo btn btn-danger btn-xs"><span class="fa fa-minus"></span></button>
                </td>
            </tr>
         <?php endforeach; ?>
        </tbody>
    </table>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
