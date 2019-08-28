<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TbCalendario */
/* @var $form yii\widgets\ActiveForm */
?>
<script type="text/javascript">
    function radio(valor){
        if(valor.value=="true"){
            //alert("verdadero");
            document.getElementsByClassName("form-group field-tbcalendario-fecha_fin")[0].style.display = "none";
            //document.getElementById("tbcalendario-fecha_fin").style.display = "none"; 
        }
        else{
            //alert("FALSO");
            document.getElementsByClassName("form-group field-tbcalendario-fecha_fin")[0].style.display = "inline";
        }
    }
</script>

<div class="tb-calendario-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $var = [ '#B2DC78' => "Guardia" , '#333530' => "Descanso/Vacaciones", '#0083ff'=> "Cumple", '#00d4ff' =>"Otro"]; ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'all_day')->radioList(
    ['true'=>'Si', 'false' => 'No'],
    [
         'item' => function($index, $label, $name, $checked, $value){
               return $label." <input type='radio' name='".$name."' value='".$value."' onchange='radio(this)'> <br>";
         }
    ]
 )->label('¿Todo el día?') ?>

    <?= $form->field($model, 'color')->dropDownList($var, ['prompt' => 'Seleccione Uno' ]); ?>
    
    <?= $form->field($model, 'fecha_inicio')->widget(DateTimePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'clientOptions' => [
            'startView' => 2,
            'minView' => 0,
            'maxView' => 2,
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]); ?>

     <!--/*$form->field($model, 'fecha_inicio')->widget(DatePicker::className(), [
        // inline too, not bad
         'inline' => true, 
         'id' => 'fechaini',
         // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);*/ -->


    <?= $form->field($model, 'fecha_fin')->widget(DateTimePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'clientOptions' => [
            'startView' => 2,
            'minView' => 0,
            'maxView' => 3,
            'autoclose' => true,
            'format' => 'yyyy-mm-dd hh:ii:ss', 
            'todayBtn' => true
        ]
    ],
    array ('id' => 'fechaIni'));?>


    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
