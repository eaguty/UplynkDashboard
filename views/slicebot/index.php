<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SlicebotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slicebots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slicebot-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(['id' => 'slicebots']) ?>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $cuentas->azteca; ?></h3>

              <p>Azteca</p>
            </div>
             <div class="icon">
              <ion-icon name="contacts"></ion-icon>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $cuentas->deportes; ?></h3>

              <p>Deportes</p>
            </div>
            <div class="icon">
              <ion-icon name="football"></ion-icon>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $cuentas->noticias; ?></h3>

              <p>Noticias</p>
            </div>
             <div class="icon">
              <ion-icon name="megaphone"></ion-icon>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $cuentas->adn40; ?></h3>

              <p>ADN40</p>
            </div>
             <div class="icon">
              <ion-icon name="paper"></ion-icon>
            </div>
            <!--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        <!-- ./col -->
      </div>
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

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pid',
            'server',
            'cuenta',
            'estado',
            //'activo',
            'fecha',
            'fechaCreado',
            'duracion',

            /*[
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{cancelar}',
                'buttons' => [

                    'cancelar' => function ($url, $model) {
                        if ($model->activo == "true")
                        {
                            $icon = 'glyphicon-remove';
                        } else {
                            $icon = 'glyphicon-eye-close';
                        }
                        return Html::a('<span class="glyphicon ' . $icon . '""></span>', $url, [

                            'title' => Yii::t('app', 'Parar proceso'),
                            'data-pjax' => '0',
                            'data-toggle-active' => $model->slicebot_id,
                        ]);

                    },                    

                ],
            ],*/
        ],
    ]); ?>

<h3>Videos Uploading...</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,

        'rowOptions'=>function($model){
            if($model->estado == "activo"){

                return ['class' => 'success'];
            }
            if($model->estado == "inactivo"){
                return ['class' => 'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
    $this->registerJs('setInterval(function(){ $.pjax.reload({container:"#slicebots"});}, 1000);', \yii\web\VIEW::POS_HEAD); 
?>

</div>

