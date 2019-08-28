<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slicebot".
 *
 * @property int $slicebot_id
 * @property string $pid
 * @property string $server
 * @property string $cuenta
 * @property string $estado
 * @property string $activo
 * @property string $fechaCreado
 * @property string $fecha
 */
class Slicebot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slicebot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'server', 'cuenta', 'estado', 'activo', 'fechaCreado'], 'required'],
            [['fechaCreado', 'fecha', 'duracion'], 'safe'],
            [['pid'], 'string', 'max' => 10],
            [['server'], 'string', 'max' => 30],
            [['cuenta'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 50],
            [['activo'], 'string', 'max' => 20],
            [['duracion'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slicebot_id' => 'Slicebot ID',
            'pid' => 'Pid',
            'server' => 'Server',
            'cuenta' => 'Cuenta',
            'estado' => 'Estado',
            'activo' => 'Activo',
            'fechaCreado' => 'Fecha Creado',
            'fecha' => 'Última Actualización',
            'duracion' => 'Tiempo activo',
        ];
    }
}
