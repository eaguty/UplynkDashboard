<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_eventos".
 *
 * @property int $id_evento
 * @property string $programa
 * @property string $senial
 * @property string $clipping
 * @property string $fecha
 * @property string $horario_inicio
 * @property string $horario_fin
 * @property string $canal
 * @property string $tipo
 * @property string $area
 * @property int $responsable
 * @property string $observaciones
 *
 * @property TbUsers $responsable0
 */
class TbEventos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_eventos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programa', 'senial', 'clipping', 'fecha', 'horario_inicio', 'horario_fin', 'canal', 'tipo', 'area', 'observaciones'], 'required'],
            [['fecha', 'horario_inicio', 'horario_fin'], 'safe'],
            [['responsable'], 'integer'],
            [['observaciones'], 'string'],
            [['programa'], 'string', 'max' => 255],
            [['senial'], 'string', 'max' => 100],
            [['clipping'], 'string', 'max' => 5],
            [['canal', 'tipo', 'area'], 'string', 'max' => 50],
            [['responsable'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsers::className(), 'targetAttribute' => ['responsable' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_evento' => 'Id Evento',
            'programa' => 'Programa',
            'senial' => 'Senial',
            'clipping' => 'Clipping',
            'fecha' => 'Fecha',
            'horario_inicio' => 'Horario Inicio',
            'horario_fin' => 'Horario Fin',
            'canal' => 'Canal',
            'tipo' => 'Tipo',
            'area' => 'Area',
            'responsable' => 'Responsable',
            'responsable0.fullName'=>'Responsable',
            'observaciones' => 'Observaciones',
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

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('tbl_tour_tag_assn', ['tour_id' => 'id']);
    }
}
