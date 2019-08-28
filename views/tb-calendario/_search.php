<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbCalendarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-calendario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_calendario') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'fecha_fin') ?>

    <?php // echo $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'background') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'responsable') ?>

    <?php // echo $form->field($model, 'all_day') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
