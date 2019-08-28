<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Media;

/**
 * MediaSearch represents the model behind the search form of `app\models\Media`.
 */
class MediaSearch extends Media
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_media'], 'integer'],
            [['pid', 'name', 'fecha', 'fechaCreado', 'estado', 'server', 'cuenta'], 'safe'],
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
        $query = Media::find();

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
            'id_media' => $this->id_media,
            'fecha' => $this->fecha,
            'fechaCreado' => $this->fechaCreado,
        ]);

        $query->andWhere('estado= :estado', [':estado' => 'activo']);


        $query->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'estado', $this->estado])
            //->andFilterWhere(['like', 'estado', 'activo'])
            ->andFilterWhere(['like', 'server', $this->server])
            ->andFilterWhere(['like', 'cuenta', $this->cuenta]);

        return $dataProvider;
    }

    public function manyProccess(){
        
        $azteca = Slicebot::find()
            ->where(['cuenta' => 'azteca.cfg', 'estado' => 'activo'])
            ->count();
        $noticias = Slicebot::find()
            ->where(['cuenta' => 'noticias.cfg', 'estado' => 'activo'])
            ->count();
        $deportes = Slicebot::find()
            ->where(['cuenta' => 'deportes.cfg', 'estado' => 'activo'])
            ->count();
        $adn40 = Slicebot::find()
            ->where(['cuenta' => 'adn40.cfg', 'estado' => 'activo'])
            ->count();
        $array=new Media();
        $array->azteca=$azteca;
        $array->noticias=$noticias;
        $array->deportes=$deportes;
        $array->adn40=$adn40;

        return $array;
    }
}
