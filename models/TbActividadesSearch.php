<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbActividades;

/**
 * TbActividadesSearch represents the model behind the search form of `app\models\TbActividades`.
 */
class TbActividadesSearch extends TbActividades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_actividad', 'responsable'], 'integer'],
            [['titulo', 'prioridad', 'fecha_limite', 'fecha_inicio', 'descripcion', 'estado'], 'safe'],
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
        $query = TbActividades::find();

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
            'id_actividad' => $this->id_actividad,
            'responsable' => $this->responsable,
            'fecha_limite' => $this->fecha_limite,
            'fecha_inicio' => $this->fecha_inicio,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'prioridad', $this->prioridad])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
