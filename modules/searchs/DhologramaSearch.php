<?php

namespace app\modules\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Dholograma;

/**
 * DhologramaSearch represents the model behind the search form of `app\models\Dholograma`.
 */
class DhologramaSearch extends Dholograma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'num_inicial', 'num_final', 'cant'], 'integer'],
            [['siglas', 'fecha', 'destino', 'obs'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Dholograma::find();

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
            'id' => $this->id,
            'num_inicial' => $this->num_inicial,
            'num_final' => $this->num_final,
            'cant' => $this->cant,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'siglas', $this->siglas])
            ->andFilterWhere(['like', 'destino', $this->destino])
            ->andFilterWhere(['like', 'obs', $this->obs]);

        return $dataProvider;
    }
}
