<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbCalendarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-calendario-index">

    <?php
    	Modal::begin([

    		'header' => '<h4>Edición</h4>',
    		'id' => 'modal',
    		'size' => 'modal-lg',
    		]);
    	echo "<div id='modalContent'> </div> ";
    	Modal::end();
    ?>

    <?php
      Modal::begin([

        'header' => '<h4>Calendario</h4>',
        'id' => 'modalEvent',
        'size' => 'modal-lg',
        ]);
      echo "<div id='newEvent'> </div> ";
      Modal::end();
    ?>



     <?=\yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events, 
      'id' => 'event',
      'clientOptions' => [ 
        'editable' => true,
        ],
        'eventClick' => "function(calEvent, jsEvent, view) {
                $(this).css('border-color', '#D8D8D8');
                $.get('index.php?r=tb-calendario/view',{'id':calEvent.id}, function(data){
                    $('#modal').modal('show')
                    .find('#modalContent')
                    .html(data);
                })
                $('#calendar').fullCalendar('removeEvents', function (calEvent) {
                    return true;
                });
           }",
    ));
    ?>

    
</div>
