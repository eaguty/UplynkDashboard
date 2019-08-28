<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_calendario".
 *
 * @property int $id_calendario
 * @property string $titulo
 * @property resource $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $color
 * @property string $background
 * @property string $url
 * @property int $responsable
 * @property int $all_day
 *
 * @property TbUsers $responsable0
 */
class TbCalendario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_calendario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'fecha_inicio', 'all_day'], 'required'],
            [['descripcion', 'all_day'], 'string'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['responsable'], 'integer'],
            [['titulo'], 'string', 'max' => 100],
            [['color', 'background'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255],
            [['responsable'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsers::className(), 'targetAttribute' => ['responsable' => 'id_users']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_calendario' => 'Id Calendario',
            'titulo' => 'Titulo',
            'descripcion' => 'Notas',
            'fecha_inicio' => 'Inicio',
            'fecha_fin' => 'Fin',
            'color' => 'Tipo de Evento',
            'background' => 'Background',
            'url' => 'Url',
            'responsable' => 'Responsable',
            'all_day' => 'All Day',
            'responsable0.fullName'=>'Creado Por',
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
