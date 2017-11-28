<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActOfRenewalReagents;

/**
 * app\models\ActOfRenewalReagentsSearch represents the model behind the search form about `app\models\ActOfRenewalReagents`.
 */
 class ActOfRenewalReagentsSearch extends ActOfRenewalReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'best_before', 'date', 'conclusion'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id', 'id_external_reagents', 'id_shelf_lifes', 'id_methods', 'relative_error', 'id_measurements'], 'integer'],
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
        $query = ActOfRenewalReagents::find();

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
            'id_external_reagents' => $this->id_external_reagents,
            'best_before' => $this->best_before,
            'date' => $this->date,
            'id_shelf_lifes' => $this->id_shelf_lifes,
            'id_methods' => $this->id_methods,
            'relative_error' => $this->relative_error,
            'id_measurements' => $this->id_measurements,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'conclusion', $this->conclusion]);

        return $dataProvider;
    }
}
