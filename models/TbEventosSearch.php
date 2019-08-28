<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TbEventos;

/**
 * TbEventosSearch represents the model behind the search form of `app\models\TbEventos`.
 */
class TbEventosSearch extends TbEventos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_evento'], 'integer'],
            [['programa', 'senial', 'clipping', 'fecha', 'horario_inicio', 'horario_fin', 'canal', 'tipo', 'area', 'responsable', 'observaciones'], 'safe'],
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
        $query = TbEventos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id_evento'=>SORT_DESC]],
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
            'id_evento' => $this->id_evento,
            'fecha' => $this->fecha,
            'horario_inicio' => $this->horario_inicio,
            'horario_fin' => $this->horario_fin,
        ]);

        $query->andFilterWhere(['like', 'programa', $this->programa])
            ->andFilterWhere(['like', 'senial', $this->senial])
            ->andFilterWhere(['like', 'clipping', $this->clipping])
            ->andFilterWhere(['like', 'canal', $this->canal])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
