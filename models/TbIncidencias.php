<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_incidencias".
 *
 * @property int $id_incidencia
 * @property string $fecha
 * @property string $hora
 * @property string $evento_programa
 * @property string $cliente
 * @property string $area_cliente
 * @property int $responsable
 * @property string $estado
 * @property resource $detalle
 * @property resource $solucion
 *
 * @property TbUsers $responsable0
 */
class TbIncidencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_incidencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'hora', 'evento_programa', 'cliente', 'estado', 'detalle'], 'required'],
            [['fecha', 'hora'], 'safe'],
            [['responsable'], 'integer'],
            [['detalle', 'solucion'], 'string'],
            [['evento_programa', 'cliente'], 'string', 'max' => 255],
            [['area_cliente'], 'string', 'max' => 150],
            [['estado'], 'string', 'max' => 80],
            [['responsable'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsers::className(), 'targetAttribute' => ['responsable' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_incidencia' => 'Id Incidencia',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
            'evento_programa' => 'Evento Programa',
            'cliente' => 'Cliente',
            'area_cliente' => 'Area Cliente',
            'responsable' => 'Responsable',
            'responsable0.fullName'=>'Responsable',
            'estado' => 'Estado',
            'detalle' => 'Detalle',
            'solucion' => 'Solucion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsable0()
    {
        return $this->hasOne(TbUsers::className(), ['id_users' => 'responsable']);
    }

     public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->responsable = Yii::$app->user->identity->id;
            
            return true;
        } else {
            return false;
        }
    }
}
