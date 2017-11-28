<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExternalReagents;

/**
 * app\models\ExternalReagentsSearch represents the model behind the search form about `app\models\ExternalReagents`.
 */
 class ExternalReagentsSearch extends ExternalReagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'create_date', 'document', 'best_before', 'description'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id', 'id_manufacturers', 'id_reagents', 'batch', 'weight', 'volume', 'id_qualifications', 'id_shelf_lifes'], 'integer'],
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
        $query = ExternalReagents::find();

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
            'id_manufacturers' => $this->id_manufacturers,
            'create_date' => $this->create_date,
            'id_reagents' => $this->id_reagents,
            'best_before' => $this->best_before,
            'batch' => $this->batch,
            'weight' => $this->weight,
            'volume' => $this->volume,
            'id_qualifications' => $this->id_qualifications,
            'id_shelf_lifes' => $this->id_shelf_lifes,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'document', $this->document])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
