<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbActividadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-actividades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_actividad') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'prioridad') ?>

    <?= $form->field($model, 'responsable') ?>

    <?= $form->field($model, 'fecha_limite') ?>

    <?php // echo $form->field($model, 'fecha_inicio') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
