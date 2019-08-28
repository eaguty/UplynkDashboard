<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_cambios".
 *
 * @property int $id_cambios
 * @property string $tema
 * @property resource $descripcion
 * @property string $importancia
 * @property string $last_update
 */
class TbCambios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cambios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tema', 'descripcion', 'importancia', 'last_update'], 'required'],
            [['descripcion'], 'string'],
            [['last_update'], 'safe'],
            [['tema'], 'string', 'max' => 150],
            [['importancia'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cambios' => 'Id Cambios',
            'tema' => 'Tema',
            'descripcion' => 'Descripcion',
            'importancia' => 'Importancia',
            'last_update' => 'Last Update',
        ];
    }
}
