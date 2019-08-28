<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbEventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-eventos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('Crear Eventos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'programa',
            'senial',
            'fecha',
            'horario_inicio',
            'horario_fin',
            'canal',
            'tipo',
            'area',
            [
                'attribute'=>'responsable',
                'value'=>'responsable0.fullName',
            ],

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
