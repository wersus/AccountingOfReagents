<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WriteOffs;

/**
 * app\models\WriteOffsSearch represents the model behind the search form about `app\models\WriteOffs`.
 */
 class WriteOffsSearch extends WriteOffs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'reason'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id', 'id_external_reagents', 'id_internal_solutions', 'id_internal_solutions_two', 'volume', 'weight'], 'integer'],
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
        $query = WriteOffs::find();

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
            'id_internal_solutions' => $this->id_internal_solutions,
            'id_internal_solutions_two' => $this->id_internal_solutions_two,
            'volume' => $this->volume,
            'weight' => $this->weight,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
