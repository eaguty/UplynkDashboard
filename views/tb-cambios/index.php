<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbCambiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cambios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cambios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Cambios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_cambios',
            'tema',
            'descripcion',
            'importancia',
            'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
