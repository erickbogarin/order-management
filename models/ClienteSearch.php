<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form about `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clien_codigo', 'clien_tipo', 'muni_codigo'], 'integer'],
            [['clien_nome', 'clien_cpf_cnpj', 'clien_email'], 'safe'],
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
        $query = Cliente::find();

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
            'clien_codigo' => $this->clien_codigo,
            'clien_tipo' => $this->clien_tipo,
            'muni_codigo' => $this->muni_codigo,
        ]);

        $query->andFilterWhere(['like', 'clien_nome', $this->clien_nome])
            ->andFilterWhere(['like', 'clien_cpf_cnpj', $this->clien_cpf_cnpj])
            ->andFilterWhere(['like', 'clien_email', $this->clien_email]);

        return $dataProvider;
    }
}
