<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbIncidenciasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-incidencias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_incidencia') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'hora') ?>

    <?= $form->field($model, 'evento_programa') ?>

    <?= $form->field($model, 'cliente') ?>

    <?php // echo $form->field($model, 'area_cliente') ?>

    <?php // echo $form->field($model, 'responsable') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'detalle') ?>

    <?php // echo $form->field($model, 'solucion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
