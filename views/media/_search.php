<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MediaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="media-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_media') ?>

    <?= $form->field($model, 'pid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'fechaCreado') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'server') ?>

    <?php // echo $form->field($model, 'cuenta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
