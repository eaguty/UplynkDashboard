<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TbIncidencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-incidencias-form">


    <?php $form = ActiveForm::begin(); ?>



<?= $form->field($model, 'fecha')->widget(DatePicker::className(), [
    'language' => 'es',
    'size' => 'ms',

    //'template' => '{input}',
    //'pickButtonIcon' => 'glyphicon glyphicon-date',
    //'inline' => true,
    'clientOptions' => [
        'autoclose' => true,
        'linkFormat' => 'yyyy-mm-dd', // if inline = true
        'format' => 'yyyy-mm-dd' // if inline = false

    ]
]);?>





<?= $form->field($model, 'hora')->widget(DateTimePicker::className(), [
    'language' => 'es',
    'size' => 'ms',

    //'template' => '{input}',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    //'inline' => true,
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,
        'showMeridian'=> true,
        'linkFormat' => 'HH:ii P', // if inline = true
        'format' => 'HH:ii P', // if inline = false
        'todayBtn' => true
    ]
]);?>

    <?= $form->field($model, 'evento_programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area_cliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Pendiente' => 'Pendiente', 'Cerrado'=>'Cerrado']) ?>

    <?= $form->field($model, 'detalle')->textArea() ?>

    <?= $form->field($model, 'solucion')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
