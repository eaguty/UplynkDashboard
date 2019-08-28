<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbCambios */

$this->title = 'Update Tb Cambios: ' . $model->id_cambios;
$this->params['breadcrumbs'][] = ['label' => 'Tb Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cambios, 'url' => ['view', 'id' => $model->id_cambios]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-cambios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
