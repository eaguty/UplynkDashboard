<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SlicebotSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slicebot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'slicebot_id') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'server') ?>

    <?= $form->field($model, 'cuenta') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'fechaCreado') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
