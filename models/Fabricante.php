<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fabricante".
 *
 * @property integer $fabr_codigo
 * @property string $fabr_nome
 *
 * @property Produto[] $produtos
 */
class Fabricante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fabricante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabr_nome'], 'required'],
            [['fabr_nome'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fabr_codigo' => 'Fabr Codigo',
            'fabr_nome' => 'Fabr Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['fabr_codigo' => 'fabr_codigo']);
    }
}
