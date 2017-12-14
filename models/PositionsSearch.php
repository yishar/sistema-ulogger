<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Positions;

/**
 * PositionsSearch represents the model behind the search form about `app\models\Positions`.
 */
class PositionsSearch extends Positions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'track_id', 'accuracy', 'image_id'], 'integer'],
            [['time', 'provider', 'comment'], 'safe'],
            [['latitude', 'longitude', 'altitude', 'speed', 'bearing'], 'number'],
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
        $query = Positions::find();

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
            'time' => $this->time,
            'user_id' => $this->user_id,
            'track_id' => $this->track_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude,
            'speed' => $this->speed,
            'bearing' => $this->bearing,
            'accuracy' => $this->accuracy,
            'image_id' => $this->image_id,
        ]);

        $query->andFilterWhere(['like', 'provider', $this->provider])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
