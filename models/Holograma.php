<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "holograma".
 *
 * @property int $id
 * @property string $serial
 * @property string $destino
 * @property string $obs
 * @property string $fecha
 */
class Holograma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'holograma';
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
