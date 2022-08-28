<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mc".
 *
 * @property int $id
 * @property string $siglas
 * @property int $num_inicial
 * @property int $num_final
 * @property int $cant
 * @property string $fecha
 * @property string $destino
 * @property string $obs
 */
class Mc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'destino'], 'required'],
            [['fecha'], 'safe'],
            [['destino','obs'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fecha' => 'Fecha',
            'destino' => 'Entregado a Destino',
            'obs' => 'Observaciones',
           
        ];
    }
}
