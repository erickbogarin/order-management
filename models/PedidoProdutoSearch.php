<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PedidoProduto;

/**
 * PedidoProdutoSearch represents the model behind the search form about `app\models\PedidoProduto`.
 */
class PedidoProdutoSearch extends PedidoProduto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pepr_codigo', 'pedi_codigo', 'pepr_quantidade', 'prod_codigo'], 'integer'],
            [['pepr_nome'], 'safe'],
            [['pepr_valor'], 'number'],
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
        $query = PedidoProduto::find();

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
            'pepr_codigo' => $this->pepr_codigo,
            'pedi_codigo' => $this->pedi_codigo,
            'pepr_quantidade' => $this->pepr_quantidade,
            'pepr_valor' => $this->pepr_valor,
            'prod_codigo' => $this->prod_codigo,
        ]);

        $query->andFilterWhere(['like', 'pepr_nome', $this->pepr_nome]);

        return $dataProvider;
    }
}
