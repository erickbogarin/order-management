<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $pedi_codigo
 * @property string $pedi_data_criacao
 * @property string $pedi_data_alteracao
 * @property integer $clien_codigo
 * @property integer $usua_codigo
 * @property integer $fopa_codigo
 *
 * @property Cliente $clienCodigo
 * @property FormaPagamento $fopaCodigo
 * @property Usuario $usuaCodigo
 * @property PedidoProduto[] $pedidoProdutos
 */
class Pedido extends \yii\db\ActiveRecord
{
    public $pepr_nome; //This is the variable that will be used for filtering
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'pedi_data_criacao',
                'updatedAtAttribute' => 'pedi_data_alteracao',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clien_codigo', 'fopa_codigo'], 'required'],
            [['pedi_data_criacao', 'pedi_data_alteracao'], 'safe'],
            [['clien_codigo', 'usua_codigo', 'fopa_codigo'], 'integer'],
            [['clien_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['clien_codigo' => 'clien_codigo']],
            [['fopa_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => FormaPagamento::className(), 'targetAttribute' => ['fopa_codigo' => 'fopa_codigo']],
            [['usua_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usua_codigo' => 'usua_codigo']],
            [['pepr_nome'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pedi_codigo' => 'Codigo',
            'pedi_data_criacao' => 'Data',
            'pedi_data_alteracao' => 'Última atualiazação',
            'clien_codigo' => 'Cliente',
            'usua_codigo' => 'Usuário',
            'fopa_codigo' => 'Forma de Pagamento',
        ];
    }

    /**
     * Sets user logged on system to usua_codigo
     *
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if($insert) {
                $this->usua_codigo = Yii::$app->user->identity->usua_codigo;
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
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['clien_codigo' => 'clien_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaPagamento()
    {
        return $this->hasOne(FormaPagamento::className(), ['fopa_codigo' => 'fopa_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['usua_codigo' => 'usua_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['pedi_codigo' => 'pedi_codigo']);
    }

}
