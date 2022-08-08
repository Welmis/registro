<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView ;
use app\models\Dcertifico;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\searchs\DcertificoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Entregas de  Certificados de Inspección';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dcertifico-index">

    

    <p>
        <?= Html::a('Add Entrega de  Certificados de Inspección', ['create'], ['class' => 'btn btn-success']) ?>
		<?=ExportMenu::widget([
    'dataProvider' => $dataProvider,'filterModel' => $searchModel,
    'columns' => [ 'siglas',
            'num_inicial',
            'num_final',
            'cant',
            'fecha',
            'destino',
            'obs',],
	'showConfirmAlert' => false,'target' => ExportMenu::TARGET_BLANK,'exportConfig' => [ExportMenu::FORMAT_CSV => false,ExportMenu::FORMAT_EXCEL => false,ExportMenu::FORMAT_HTML => false, ExportMenu::FORMAT_TEXT => false], 'showConfirmAlert' => false, 'filename' => 'ListadoEntregaCertificos'.date("m.d.y"), 
    'dropdownOptions' => [
        'label' => 'Export All',
        'class' => 'btn btn-outline-secondary btn-default'
    ]
])
   
?>
    </p>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table-responsive'],
        'pager' => [
                    'firstPageLabel' => 'Inicio',
                    'lastPageLabel' => 'Fin'
                ],  
		'layout' => "{items}\n{summary}\n{pager}",'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'siglas',
            'num_inicial',
            'num_final',
            'cant',
            'fecha',
            'destino',
            'obs',
           
        ],
    ]); ?>


</div>
