<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forma_pagamento".
 *
 * @property integer $fopa_codigo
 * @property string $fopa_nome
 *
 * @property Pedido[] $pedidos
 */
class FormaPagamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'forma_pagamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fopa_nome'], 'required'],
            [['fopa_nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fopa_codigo' => 'Fopa Codigo',
            'fopa_nome' => 'Fopa Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['fopa_codigo' => 'fopa_codigo']);
    }
}
