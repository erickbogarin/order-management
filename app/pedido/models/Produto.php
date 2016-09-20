<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property integer $prod_codigo
 * @property string $prod_nome
 * @property integer $cate_codigo
 * @property integer $fabr_codigo
 * @property string $prod_valor
 * @property integer $prod_estoque
 *
 * @property PedidoProduto[] $pedidoProdutos
 * @property Categoria $cateCodigo
 * @property Fabricante $fabrCodigo
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_nome', 'cate_codigo', 'fabr_codigo', 'prod_valor', 'prod_estoque'], 'required'],
            [['cate_codigo', 'fabr_codigo', 'prod_estoque'], 'integer'],
            [['prod_valor'], 'number', 'min' => 0, 'max' => 5000],
            [['prod_estoque'], 'number', 'min' => 0],
            [['prod_nome'], 'string', 'max' => 160],
            [['cate_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['cate_codigo' => 'cate_codigo']],
            [['fabr_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Fabricante::className(), 'targetAttribute' => ['fabr_codigo' => 'fabr_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prod_codigo' => 'Código',
            'prod_nome' => 'Nome',
            'cate_codigo' => 'Categoria',
            'fabr_codigo' => 'Fabricante',
            'prod_valor' => 'Valor',
            'prod_estoque' => 'Estoque',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['prod_codigo' => 'prod_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['cate_codigo' => 'cate_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFabricante()
    {
        return $this->hasOne(Fabricante::className(), ['fabr_codigo' => 'fabr_codigo']);
    }
}
