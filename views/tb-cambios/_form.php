<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\TbCambios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-cambios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tema')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'importancia')->dropDownList(['Alta' => 'Alta', 'Mediana' => 'Mediana', 'Baja'=>'Baja']) ?>

    <?= $form->field($model, 'last_update')->widget(DatePicker::className(), [
        'language' => 'es',
        'size' => 'ms',
        'clientOptions' => [
            'autoclose' => true,
            'linkFormat' => 'yyyy-mm-dd', // if inline = true
            'format' => 'yyyy-mm-dd' // if inline = false

        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
