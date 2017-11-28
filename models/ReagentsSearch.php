<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reagents;

/**
 * app\models\ReagentsSearch represents the model behind the search form about `app\models\Reagents`.
 */
 class ReagentsSearch extends Reagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['guid', 'created_at', 'updated_at', 'deleted_at', 'name', 'formula', 'short', 'short_formula'], 'safe'],
            [['deleted_by', 'updated_by', 'lock', 'id'], 'integer'],
            [['liquid'], 'boolean'],
            [['density'], 'number'],
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
        $query = Reagents::find();

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
            'liquid' => $this->liquid,
            'density' => $this->density,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'formula', $this->formula])
            ->andFilterWhere(['like', 'short', $this->short])
            ->andFilterWhere(['like', 'short_formula', $this->short_formula]);

        return $dataProvider;
    }
}
