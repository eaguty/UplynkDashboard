<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbIncidenciasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Incidencias';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tb-incidencias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Incidencias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions'=>function($model){
            if($model->estado == "Activo"){
                return ['class' => 'danger'];
            }
            if($model->estado == "Cerrado"){
                return ['class' => 'success'];
            }
        },
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fecha',
            'hora',
            'evento_programa',
            'cliente',
            'area_cliente',
            [
                'attribute'=>'responsable',
                'value'=>'responsable0.fullName',
            ],
            'estado',
            [      
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update}',
                'visibleButtons' => [
                    'update' => function ($model) {
                        return $model->responsable == Yii::$app->user->identity->id || Yii::$app->user->identity->id == 10;
                    },
                ]
                
            ],

            
        ],
    ]); ?>
</div>
