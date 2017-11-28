<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InternalSolutions;

/**
 * app\models\InternalSolutionsSearch represents the model behind the search form about `app\models\InternalSolutions`.
 */
 class InternalSolutionsSearch extends InternalSolutions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'create_date', 'best_before', 'description'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id', 'volume', 'id_solutions'], 'integer'],
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
        $query = InternalSolutions::find();

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
            'create_date' => $this->create_date,
            'best_before' => $this->best_before,
            'volume' => $this->volume,
            'id_solutions' => $this->id_solutions,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
