<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Measurements;

/**
 * app\models\MeasurementsSearch represents the model behind the search form about `app\models\Measurements`.
 */
 class MeasurementsSearch extends Measurements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'date'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id'], 'integer'],
            [['mass_consentarion', 'Kk', 'control standard'], 'number'],
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
        $query = Measurements::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'deleted_by' => $this->deleted_by,
            'updated_by' => $this->updated_by,
            'lock' => $this->lock,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'id' => $this->id,
            'date' => $this->date,
            'mass_concentration' => $this->mass_concentration,
            'Kk' => $this->Kk,
            'control_standard' => $this->control_standard,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid]);

        return $dataProvider;
    }
}
