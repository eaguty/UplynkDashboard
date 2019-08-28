<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_users".
 *
 * @property int $id_users
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string $tipo
 * @property string $authkey
 */
class TbUsers extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nombre', 'apellido'], 'required'],
            [['username', 'password', 'nombre', 'apellido'], 'string', 'max' => 100],
            [['tipo', 'authkey'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_users' => 'Id Users',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'tipo' => 'Tipo',
            'authkey' => 'Authkey',
        ];
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getId()
    {
        return $this->id_users;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
        
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password){
       // $password=Yii::$app->getSecurity()->generatePasswordHash($password);
        if (Yii::$app->getSecurity()->validatePassword($password, $this->password)) {
            return true;
        } else {
            return false;
        }
    }


    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            
            return true;
        } else {
            return false;
        }
    }

    public function getfullName()
        {
                return $this->nombre.' '.$this->apellido;
        }

   /* public function beforeSave($) {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
    return parent::beforeSave($insert);
}*/
}
