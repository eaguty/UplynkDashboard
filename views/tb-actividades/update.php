<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbActividades */

$this->title = 'Actualizar Actividades: ' . $model->id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Tb Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_actividad, 'url' => ['view', 'id' => $model->id_actividad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-actividades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
