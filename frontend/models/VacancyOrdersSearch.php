<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VacancyOrders;

/**
 * VacancyOrdersSearch represents the model behind the search form of `common\models\VacancyOrders`.
 */
class VacancyOrdersSearch extends VacancyOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'vacancy_id', 'worker_id', 'status', 'company_view', 'worker_view'], 'integer'],
            [['created_at', 'date_approval'], 'safe'],
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
        $query = VacancyOrders::find();

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
            'company_id' => $this->company_id,
            'vacancy_id' => $this->vacancy_id,
            'worker_id' => $this->worker_id,
            'status' => $this->status,
            'company_view' => $this->company_view,
            'worker_view' => $this->worker_view,
            'created_at' => $this->created_at,
            'date_approval' => $this->date_approval,
        ]);

        return $dataProvider;
    }
}
