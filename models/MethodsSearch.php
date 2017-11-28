<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Methods;

/**
 * app\models\MethodsSearch represents the model behind the search form about `app\models\Methods`.
 */
 class MethodsSearch extends Methods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'name', 'short', 'document', 'index'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id'], 'integer'],
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
        $query = Methods::find();

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
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'short', $this->short])
            ->andFilterWhere(['like', 'document', $this->document])
            ->andFilterWhere(['like', 'index', $this->index]);

        return $dataProvider;
    }
}
