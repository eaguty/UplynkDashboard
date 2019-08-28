<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id_media
 * @property string $pid
 * @property string $name
 * @property string $fecha
 * @property string $fechaCreado
 * @property string $estado
 * @property string $server
 * @property string $cuenta
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $azteca;
    public $noticias;
    public $deportes;
    public $adn40;

    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'name', 'fecha', 'fechaCreado', 'estado', 'server', 'cuenta'], 'required'],
            [['fecha', 'fechaCreado'], 'safe'],
            [['pid'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 255],
            [['estado', 'cuenta'], 'string', 'max' => 20],
            [['server'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_media' => 'Id Media',
            'pid' => 'Pid',
            'name' => 'Name',
            'fecha' => 'Última Actualización',
            'fechaCreado' => 'Fecha Creado',
            'estado' => 'Estado',
            'server' => 'Server',
            'cuenta' => 'Cuenta',
        ];
    }
}
