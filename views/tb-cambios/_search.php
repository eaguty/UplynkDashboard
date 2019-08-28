<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbCambiosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-cambios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cambios') ?>

    <?= $form->field($model, 'tema') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'importancia') ?>

    <?= $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
