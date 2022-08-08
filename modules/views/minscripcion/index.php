<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\searchs\CertificoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listado de Modelos de Inscripción';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certifico-index">

   

    <p>
        
		<?=ExportMenu::widget([
    'dataProvider' => $dataProvider,'filterModel' => $searchModel,
    'columns' => [ 'serial',
            'destino',
            'obs',
            'fecha'],
	'showConfirmAlert' => false,'target' => ExportMenu::TARGET_BLANK,'exportConfig' => [ExportMenu::FORMAT_CSV => false,ExportMenu::FORMAT_EXCEL => false,ExportMenu::FORMAT_HTML => false, ExportMenu::FORMAT_TEXT => false], 'showConfirmAlert' => true, 'filename' => 'Inscripcion'.date("m.d.y"), 
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
        'filterModel' => $searchModel,
		'pager' => [
                    'firstPageLabel' => 'Inicio',
                    'lastPageLabel' => 'Fin'
                ],  
		'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'serial',
            'destino',
            'obs',
            'fecha',
           
        ],
    ]); ?>


</div>
