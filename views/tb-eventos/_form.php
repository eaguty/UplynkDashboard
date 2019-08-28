<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\taggable\Taggable;
use dosamigos\selectize\SelectizeTextInput;
use app\models\TbTipoEventos;

/* @var $this yii\web\View */
/* @var $model app\models\TbEventos */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tb-eventos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'programa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clipping')->radioList( ['Si'=>'Si', 'No' => 'No'] ); ?>

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

    <?= $form->field($model, 'horario_inicio')->widget(DateTimePicker::className(), [
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

    <?= $form->field($model, 'horario_fin')->widget(DateTimePicker::className(), [
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

    <?= $form->field($model, 'canal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->widget(SelectizeTextInput::className(), [
        // calls an action that returns a JSON object with matched
        // tags
        'loadUrl' => ['tb-tipo-eventos/list'],
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'plugins' => ['remove_button'],
            'valueField' => 'name',
            'labelField' => 'name',
            'searchField' => ['name'],
            'create' => true,
        ],
    ])->hint('Usar comas para separar') 
    ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
