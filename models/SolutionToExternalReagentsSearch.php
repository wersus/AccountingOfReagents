<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SolutionToExternalReagents;

/**
 * app\models\SolutionToExternalReagentsSearch represents the model behind the search form about `app\models\SolutionToExternalReagents`.
 */
 class SolutionToExternalReagentsSearch extends SolutionToExternalReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id', 'id_solutions', 'id_solutions_two', 'id_methods', 'id_reagents', 'part'], 'integer'],
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
        $query = SolutionToExternalReagents::find();

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
            'id_solutions' => $this->id_solutions,
            'id_solutions_two' => $this->id_solutions_two,
            'id_methods' => $this->id_methods,
            'id_reagents' => $this->id_reagents,
            'part' => $this->part,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid]);

        return $dataProvider;
    }
}
