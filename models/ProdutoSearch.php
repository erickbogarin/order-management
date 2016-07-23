<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form about `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prod_codigo', 'cate_codigo', 'fabr_codigo', 'prod_estoque'], 'integer'],
            [['prod_nome'], 'safe'],
            [['prod_valor'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'prod_codigo' => $this->prod_codigo,
            'cate_codigo' => $this->cate_codigo,
            'fabr_codigo' => $this->fabr_codigo,
            'prod_valor' => $this->prod_valor,
            'prod_estoque' => $this->prod_estoque,
        ]);

        $query->andFilterWhere(['like', 'prod_nome', $this->prod_nome]);

        return $dataProvider;
    }
}
