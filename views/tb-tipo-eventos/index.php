<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbTipoEventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Tipo Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-tipo-eventos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tb Tipo Eventos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipo_eventos',
            'tipo_eventos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
