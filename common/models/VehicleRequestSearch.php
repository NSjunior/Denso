<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VehicleRequest;
use common\models\Vehicle;

/**
 * VehicleRequestSearch represents the model behind the search form of `common\models\VehicleRequest`.
 */
class VehicleRequestSearch extends VehicleRequest
{
    public $fullname;
    public $role;
    public $statue;
    public $plate;
    public $province;
    public $vehicleType;
    public $approver;
    public $requested_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vehicle_id', 'requested_id', 'requested_role', 'approver', 'status', 'creator', 'updater'], 'integer'],
            [['approved_at', 'created_at', 'updated_at'], 'safe'],
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
        $query = VehicleRequest::find();

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
            'vehicle_id' => $this->vehicle_id,
            'requested_id' => $this->requested_id,
            'requested_role' => $this->requested_role,
            'approver' => $this->approver,
            'approved_at' => $this->approved_at,
            'status' => $this->status,
            'creator' => $this->creator,
            'created_at' => $this->created_at,
            'updater' => $this->updater,
            'updated_at' => $this->updated_at,
        ]);

        if ($this->requested_id) {
            $query->innerJoinWith('employee');
            $query->andFilterWhere([
                'employee.code' => 'requested_id',
                'employee.fullname' => $this->fullname

            ]);
        }

        if ($this->province) {
            $query->joinWith('province');
            $query->andFilterWhere([
                'province.id' => 'province',
                'province.name' => $this->province
            ]);
        }


        // if ($this->fullname) {
        //     $query->andFilterWhere([
        //         'or',
        //         ['like', 'firstname', $this->fullname],
        //         ['like', 'lastname', $this->fullname],
        //     ]);
        // }


        // $query->andFilterWhere(['ilike', 'request_id', $this->request_id])
        //     ->andFilterWhere(['ilike', 'title', $this->title])
        //     ->andFilterWhere(['ilike', 'firstname', $this->firstname])
        //     ->andFilterWhere(['ilike', 'lastname', $this->lastname]);

        return $dataProvider;
    }
}
