<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Services;

/**
 * ServicesSearch represents the model behind the search form about `app\models\Services`.
 */
class ServicesSearch extends Services
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['services', 'department', 'when_approval_required', 'minimum_eligibility', 'act_rule', 'validity_of_approval', 'procedure_for_applying', 'website', 'time_limit', 'authority_responsible', 'notified_under_public', 'any_other_special_condition', 'type_of_industry', 'industry_status'], 'safe'],
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
        $query = Services::find();

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
        ]);

        $query->andFilterWhere(['like', 'services', $this->services])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'when_approval_required', $this->when_approval_required])
            ->andFilterWhere(['like', 'minimum_eligibility', $this->minimum_eligibility])
            ->andFilterWhere(['like', 'act_rule', $this->act_rule])
            ->andFilterWhere(['like', 'validity_of_approval', $this->validity_of_approval])
            ->andFilterWhere(['like', 'procedure_for_applying', $this->procedure_for_applying])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'time_limit', $this->time_limit])
            ->andFilterWhere(['like', 'authority_responsible', $this->authority_responsible])
            ->andFilterWhere(['like', 'notified_under_public', $this->notified_under_public])
            ->andFilterWhere(['like', 'any_other_special_condition', $this->any_other_special_condition])
            ->andFilterWhere(['like', 'type_of_industry', $this->type_of_industry])
            ->andFilterWhere(['like', 'industry_status', $this->industry_status]);

        return $dataProvider;
    }
}
