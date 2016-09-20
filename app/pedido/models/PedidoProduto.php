<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido_produto".
 *
 * @property integer $pepr_codigo
 * @property integer $pedi_codigo
 * @property string $pepr_nome
 * @property integer $pepr_quantidade
 * @property string $pepr_valor
 * @property integer $prod_codigo
 *
 * @property Pedido $pediCodigo
 * @property Produto $prodCodigo
 */
class PedidoProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedi_codigo', 'pepr_nome', 'pepr_quantidade', 'prod_codigo'], 'required'],
            [['pedi_codigo', 'pepr_quantidade', 'prod_codigo'], 'integer'],
            [['pepr_valor'], 'number'],
            [['pepr_quantidade'], 'validarEstoque'],
            [['pepr_valor'], 'number', 'min' => 0],
            [['pepr_nome'], 'string', 'max' => 160],
            [['pedi_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['pedi_codigo' => 'pedi_codigo']],
            [['prod_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['prod_codigo' => 'prod_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pepr_codigo' => 'Código',
            'pedi_codigo' => 'Código do Pedido',
            'pepr_nome' => 'Nome do pedido',
            'pepr_quantidade' => 'Quantidade',
            'pepr_valor' => 'Valor',
            'prod_codigo' => 'Produto',
        ];
    }


    public function validarEstoque($attribute, $params)
    {
        if($this->pepr_quantidade <= $this->produto->prod_estoque ) {
            $this->pepr_valor = $this->produto->prod_valor * $this->pepr_quantidade;
        }
        else {
            $this->addError($attribute, 'Valor máximo: '. $this->produto->prod_estoque);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['pedi_codigo' => 'pedi_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['prod_codigo' => 'prod_codigo']);
    }
}
