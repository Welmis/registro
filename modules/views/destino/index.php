<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\searchs\DestinoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Destinos';

?>
<div class="destino-index">

    

    <p>
        <?= Html::a('Create Destino', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',

        ],
    ]); ?>


</div>
