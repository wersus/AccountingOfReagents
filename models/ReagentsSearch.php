<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reagents;

/**
 * ReagentsSearch represents the model behind the search form about `app\models\Reagents`.
 */
class ReagentsSearch extends Reagents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reagent_id', 'manufacturer_id', 'classification_id', 'concentration_id', 'method_id', 'amount'], 'integer'],
            [['name', 'create_date', 'formula', 'best_before', 'description'], 'safe'],
            [['density'], 'number'],
            [['reagent_type', 'liquid'], 'boolean'],
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
            'reagent_id' => $this->reagent_id,
            'manufacturer_id' => $this->manufacturer_id,
            'classification_id' => $this->classification_id,
            'concentration_id' => $this->concentration_id,
            'method_id' => $this->method_id,
            'create_date' => $this->create_date,
            'amount' => $this->amount,
            'best_before' => $this->best_before,
            'density' => $this->density,
            'reagent_type' => $this->reagent_type,
            'liquid' => $this->liquid,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'formula', $this->formula])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
