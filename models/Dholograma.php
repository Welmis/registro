<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dholograma".
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
class Dholograma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dholograma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['siglas', 'num_inicial', 'num_final', 'cant', 'fecha', 'destino', 'obs'], 'required'],
            [['num_inicial', 'num_final', 'cant'], 'integer'],
            [['fecha'], 'safe'],
            [['siglas'], 'string', 'max' => 15],
            [['destino', 'obs'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'siglas' => 'Siglas',
            'num_inicial' => 'Num Inicial',
            'num_final' => 'Num Final',
            'cant' => 'Cantidad de Modelos',
            'fecha' => 'Fecha',
            'destino' => 'Entregado a',
            'obs' => 'Observaciones',
        ];
    }
}
