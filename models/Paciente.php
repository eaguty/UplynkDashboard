<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paciente".
 *
 * @property integer $idPaciente
 * @property string $Nombre
 * @property string $Apellido
 * @property string $fechaNacimiento
 *
 * @property Consultas[] $consultas
 */
class Paciente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'paciente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'fechaNacimiento'], 'required'],
            [['fechaNacimiento'], 'safe'],
            [['file'],'file'],
            [['Nombre', 'Apellido','photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPaciente' => 'Id Paciente',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'fechaNacimiento' => 'Fecha Nacimiento',
            'file'=>'Imagen de Perfil',
        ];
    }

    public function getfullName()
        {
                return $this->Nombre.' '.$this->Apellido;
        }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consultas::className(), ['idPaciente' => 'idPaciente']);
    }
}
