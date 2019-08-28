<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_actividades".
 *
 * @property int $id_actividad
 * @property string $titulo
 * @property string $prioridad
 * @property int $responsable
 * @property string $fecha_limite
 * @property string $fecha_inicio
 * @property string $descripcion
 * @property string $estado
 *
 * @property TbUsers $responsable0
 */
class TbActividades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_actividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'prioridad', 'responsable', 'fecha_limite', 'fecha_inicio', 'descripcion', 'estado'], 'required'],
            [['responsable'], 'integer'],
            [['fecha_limite', 'fecha_inicio'], 'safe'],
            [['descripcion'], 'string'],
            [['titulo'], 'string', 'max' => 200],
            [['prioridad'], 'string', 'max' => 20],
            [['estado'], 'string', 'max' => 15],
            [['responsable'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsers::className(), 'targetAttribute' => ['responsable' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_actividad' => 'Id Actividad',
            'titulo' => 'Titulo',
            'prioridad' => 'Prioridad',
            'responsable' => 'Responsable',
            'fecha_limite' => 'Fecha Limite',
            'fecha_inicio' => 'Fecha Inicio',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsable0()
    {
        return $this->hasOne(TbUsers::className(), ['id_users' => 'responsable']);
    }
}
