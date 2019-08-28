<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Json;
use yii\web\JsExpression;
use wbraganca\selectivity\SelectivityWidget;


$model->responsable = [2,15];
$selectivityValues = [];

foreach ($model->responsable as $id) {

    $selectivityValues[] = ['id' => $id, 'text' =>$id];

}
/* @var $this yii\web\View */
/* @var $model app\models\TbActividades */
/* @var $form yii\widgets\ActiveForm */
/* @var $responsable array */
/* @var $model app\modules\yii2extensions\models\SelectivityForm */

?>

<div class="tb-actividades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prioridad')->dropDownList(['Alta' => 'Alta', 'Media' => 'Media', 'Baja'=>'Baja']) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(DatePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd', // if inline = true
            'format' => 'yyyy-mm-dd' // if inline = false

        ]
    ]);?>

    <?= $form->field($model, 'fecha_limite')->widget(DatePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd', // if inline = true
            'format' => 'yyyy-mm-dd' // if inline = false

        ]
    ]);?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'estado')->dropDownList(['Activo' => 'Activo', 'Pendiente' => 'Pendiente', 'Cerrado'=>'Cerrado']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
