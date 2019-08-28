<?php

namespace app\models;
use dosamigos\taggable\Taggable;

use Yii;

/**
 * This is the model class for table "tb_tipo_eventos".
 *
 * @property int $id_tipo_eventos
 * @property string $tipo_eventos
 */
class TbTipoEventos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_tipo_eventos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_eventos'], 'required'],
            [['tipo_eventos'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_eventos' => 'Id Tipo Eventos',
            'tipo_eventos' => 'Tipo Eventos',
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => Taggable::className(),
            ],
        ];
    }
}
