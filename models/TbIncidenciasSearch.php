<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbIncidencias;

/**
 * TbIncidenciasSearch represents the model behind the search form of `app\models\TbIncidencias`.
 */
class TbIncidenciasSearch extends TbIncidencias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_incidencia'], 'integer'],
            [['fecha', 'hora', 'evento_programa', 'cliente', 'area_cliente', 'responsable', 'estado', 'detalle', 'solucion'], 'safe'],
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
        $query = TbIncidencias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id_incidencia'=>SORT_DESC]],
            'pagination' => [ 'pageSize' => 30 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

         $query->joinWith('responsable0');

        // grid filtering conditions
        $query->orFilterWhere(['like','tb_users.nombre', $this->responsable]);    
        $query->orFilterWhere(['like','tb_users.apellido', $this->responsable]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id_incidencia' => $this->id_incidencia,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
        ]);

        $query->andFilterWhere(['like', 'evento_programa', $this->evento_programa])
            ->andFilterWhere(['like', 'cliente', $this->cliente])
            ->andFilterWhere(['like', 'area_cliente', $this->area_cliente])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'detalle', $this->detalle])
            ->andFilterWhere(['like', 'solucion', $this->solucion]);

        return $dataProvider;
    }
}
