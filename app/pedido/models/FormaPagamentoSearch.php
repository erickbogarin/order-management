<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormaPagamento;

/**
 * FormaPagamentoSearch represents the model behind the search form about `app\models\FormaPagamento`.
 */
class FormaPagamentoSearch extends FormaPagamento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fopa_codigo'], 'integer'],
            [['fopa_nome'], 'safe'],
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
        $query = FormaPagamento::find();

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
            'fopa_codigo' => $this->fopa_codigo,
        ]);

        $query->andFilterWhere(['like', 'fopa_nome', $this->fopa_nome]);

        return $dataProvider;
    }
}
