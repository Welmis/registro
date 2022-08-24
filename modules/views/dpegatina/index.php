<?php

use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\searchs\DpegatinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Entregas de Pegatinas';

?>
<div class="dpegatina-index">

      <p>
        <?= Html::a('Add Entrega de Pegatina', ['create'], ['class' => 'btn btn-success']) ?>
		<?=ExportMenu::widget([
    'dataProvider' => $dataProvider,'filterModel' => $searchModel,
    'columns' => [ 'serial',
            'destino',
            'obs',
            'fecha'],
	'showConfirmAlert' => false,'target' => ExportMenu::TARGET_BLANK,'exportConfig' => [ExportMenu::FORMAT_CSV => false,ExportMenu::FORMAT_EXCEL => false,ExportMenu::FORMAT_HTML => false, ExportMenu::FORMAT_TEXT => false], 'showConfirmAlert' => false, 'filename' => 'Pegatinas'.date("m.d.y"), 
    'dropdownOptions' => [
        'label' => 'Export All',
        'class' => 'btn btn-outline-secondary btn-default'
    ]
])
   
?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,'options' => ['class' => 'table-responsive'],
        'pager' => [
                    'firstPageLabel' => 'Inicio',
                    'lastPageLabel' => 'Fin'
                ],  
		'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'siglas',
            'num_inicial',
            'num_final',
            'cant',
           'anno',
           'fecha',
           'destino',
           'obs',
            
        ],
    ]); ?>


</div>
