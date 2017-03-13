<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PolicyDetails;

/**
 * PolicyDetailsSearch represents the model behind the search form about `common\models\PolicyDetails`.
 */
class PolicyDetailsSearch extends PolicyDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company', 'product', 'policy_type', 'cover', 'application_status', 'underwriting_outcome', 'policy_status', 'status', 'CB', 'UB'], 'integer'],
            [['policy_number', 'policy_term', 'cover_start_date', 'cover_end_date', 'reason', 'review_date', 'renewal_date', 'DOC', 'DOU'], 'safe'],
            [['sum_assured', 'commision'], 'number'],
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
        $query = PolicyDetails::find();

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
            'company' => $this->company,
            'product' => $this->product,
            'policy_type' => $this->policy_type,
            'cover' => $this->cover,
            'sum_assured' => $this->sum_assured,
            'cover_start_date' => $this->cover_start_date,
            'cover_end_date' => $this->cover_end_date,
            'application_status' => $this->application_status,
            'underwriting_outcome' => $this->underwriting_outcome,
            'policy_status' => $this->policy_status,
            'review_date' => $this->review_date,
            'renewal_date' => $this->renewal_date,
            'commision' => $this->commision,
            'status' => $this->status,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'policy_number', $this->policy_number])
            ->andFilterWhere(['like', 'policy_term', $this->policy_term])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
