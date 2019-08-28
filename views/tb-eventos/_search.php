<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbEventosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-eventos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_evento') ?>

    <?= $form->field($model, 'programa') ?>

    <?= $form->field($model, 'senial') ?>

    <?= $form->field($model, 'clipping') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'horario_inicio') ?>

    <?php // echo $form->field($model, 'horario_fin') ?>

    <?php // echo $form->field($model, 'canal') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'responsable') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
