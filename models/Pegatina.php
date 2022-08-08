<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegatina".
 *
 * @property int $id
 * @property string $serial
 * @property string $destino
 * @property string $obs
 * @property string $fecha
 * @property int $anno
 */
class Pegatina extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegatina';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial', 'destino', 'obs', 'fecha', 'anno'], 'required'],
            [['fecha'], 'safe'],
            [['anno'], 'integer'],
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
            'anno' => 'Año',
        ];
    }
}
