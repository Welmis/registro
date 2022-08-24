<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "minscripcion".
 *
 * @property int $id
 * @property string $serial
 * @property string $destino
 * @property string $obs
 * @property string $fecha
 */
class Minscripcion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'minscripcion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial', 'destino','fecha'], 'required'],
            [['fecha'], 'safe'],
			[['serial'], 'unique'],
            [['serial'], 'string', 'max' => 25],
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
            'serial' => 'Numero de Serie','idp' => 'padre',
            'destino' => 'Entregado a',
            'obs' => 'Observaciones',
            'fecha' => 'Fecha',
        ];
    }
}
