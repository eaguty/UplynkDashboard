<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Slicebot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slicebot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'server')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'activo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaCreado')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
