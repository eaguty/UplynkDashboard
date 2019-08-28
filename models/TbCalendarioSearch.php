<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbCalendario;

/**
 * TbCalendarioSearch represents the model behind the search form of `app\models\TbCalendario`.
 */
class TbCalendarioSearch extends TbCalendario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_calendario', 'responsable', 'all_day'], 'integer'],
            [['titulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'color', 'background', 'url'], 'safe'],
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
        $query = TbCalendario::find();

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
            'id_calendario' => $this->id_calendario,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'responsable' => $this->responsable,
            'all_day' => $this->all_day,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'background', $this->background])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}
