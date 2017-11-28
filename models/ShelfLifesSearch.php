<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShelfLifes;

/**
 * app\models\ShelfLifesSearch represents the model behind the search form about `app\models\ShelfLifes`.
 */
 class ShelfLifesSearch extends ShelfLifes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'short'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id', 'value'], 'integer'],
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
        $query = ShelfLifes::find();

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
            'value' => $this->value,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'short', $this->short]);

        return $dataProvider;
    }
}
