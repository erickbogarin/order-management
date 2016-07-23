<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fabricante;

/**
 * FabricanteSearch represents the model behind the search form about `app\models\Fabricante`.
 */
class FabricanteSearch extends Fabricante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fabr_codigo'], 'integer'],
            [['fabr_nome'], 'safe'],
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
        $query = Fabricante::find();

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
            'fabr_codigo' => $this->fabr_codigo,
        ]);

        $query->andFilterWhere(['like', 'fabr_nome', $this->fabr_nome]);

        return $dataProvider;
    }
}
