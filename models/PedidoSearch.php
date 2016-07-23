<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `app\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedi_codigo', 'clien_codigo', 'usua_codigo', 'fopa_codigo'], 'integer'],
            [['pedi_data_criacao', 'pedi_data_alteracao'], 'safe'],
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
        $query = Pedido::find();

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
            'pedi_codigo' => $this->pedi_codigo,
            'pedi_data_criacao' => $this->pedi_data_criacao,
            'pedi_data_alteracao' => $this->pedi_data_alteracao,
            'clien_codigo' => $this->clien_codigo,
            'usua_codigo' => $this->usua_codigo,
            'fopa_codigo' => $this->fopa_codigo,
        ]);

        return $dataProvider;
    }
}
