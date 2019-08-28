<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(['id' => 'media']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions'=>function($model){
            if($model->estado == "activo"){

                return ['class' => 'success'];
            }
            if($model->estado == "inactivo"){
                return ['class' => 'danger'];
            }
        },
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_media',
            'pid',
            'name',
            'estado',
            'fecha',
            'fechaCreado',
            'cuenta',
            'server',

            
        ],
    ]); ?>

<?php Pjax::end(); ?>
<?php
    $this->registerJs('setInterval(function(){ $.pjax.reload({container:"#media"});}, 1000);', \yii\web\VIEW::POS_HEAD); 
?>
</div>
