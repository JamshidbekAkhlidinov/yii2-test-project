<?php

namespace app\modules\admin\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HistoryOfSolution;

/**
 * HistoryOfSolutionSearch represents the model behind the search form of `app\models\HistoryOfSolution`.
 */
class HistoryOfSolutionSearch extends HistoryOfSolution
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'test_id', 'selected_test_id', 'user_id', 'correct_answers_count'], 'integer'],
            [['date', 'answers'], 'safe'],
            [['ball'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = HistoryOfSolution::find();

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
            'subject_id' => $this->subject_id,
            'test_id' => $this->test_id,
            'selected_test_id' => $this->selected_test_id,
            'user_id' => $this->user_id,
            'date' => $this->date,
            'ball' => $this->ball,
            'correct_answers_count' => $this->correct_answers_count,
        ]);

        $query->andFilterWhere(['like', 'answers', $this->answers]);

        return $dataProvider;
    }
}
