<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbCambios;

/**
 * TbCambiosSearch represents the model behind the search form of `app\models\TbCambios`.
 */
class TbCambiosSearch extends TbCambios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cambios'], 'integer'],
            [['tema', 'descripcion', 'importancia', 'last_update'], 'safe'],
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
        $query = TbCambios::find();

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
            'id_cambios' => $this->id_cambios,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'tema', $this->tema])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'importancia', $this->importancia]);

        return $dataProvider;
    }
}
