<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usua_codigo
 * @property string $usua_nome
 * @property string $usua_email
 * @property string $usua_senha
 * @property integer $usua_tipo
 * @property boolean $usua_habilitado
 * @property string $usua_auth_key
 *
 * @property Pedido[] $pedidos
 */
class Usuario extends \yii\db\ActiveRecord
{
    public $usua_senha_temp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usua_nome', 'usua_email', 'usua_senha', 'usua_tipo', 'usua_habilitado'], 'required'],
            [['usua_tipo'], 'integer'],
            [['usua_habilitado'], 'boolean'],
            [['usua_nome'], 'string', 'max' => 120],
            [['usua_email'], 'string', 'max' => 100],
            [['usua_email'], 'unique'],
            [['usua_email'], 'email'],
            [['usua_senha'], 'string', 'max' => 60],
            [['usua_auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usua_codigo' => 'Codigo',
            'usua_nome' => 'Nome',
            'usua_email' => 'Email',
            'usua_senha' => 'Senha',
            'usua_tipo' => 'Perfil',
            'usua_habilitado' => 'Habilitado',
            'usua_auth_key' => 'Auth Key',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {

            if($insert) {

                $this->usua_auth_key = Yii::$app->getSecurity()->generateRandomString();

            }


            if($this->usua_senha_temp != $this->usua_senha){
                
                $this->usua_senha = Yii::$app->getSecurity()->generatePasswordHash($this->usua_senha);

            }

            return true;
        }
        else {

            return false;

        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['usua_codigo' => 'usua_codigo']);
    }
}
