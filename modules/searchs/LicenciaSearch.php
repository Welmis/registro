<?php

namespace app\modules\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Licencia;

/**
 * LicenciaSearch represents the model behind the search form of `app\models\Licencia`.
 */
class LicenciaSearch extends Licencia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['serial', 'destino', 'obs', 'fecha'], 'safe'],
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
        $query = Licencia::find();

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
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'serial', $this->serial])
            ->andFilterWhere(['like', 'destino', $this->destino])
            ->andFilterWhere(['like', 'obs', $this->obs]);

        return $dataProvider;
    }
}
