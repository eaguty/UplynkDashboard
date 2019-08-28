<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbIncidencias */

$this->title = 'Editar Incidencia: ' . $model->id_incidencia;
$this->params['breadcrumbs'][] = ['label' => 'Incidencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_incidencia, 'url' => ['view', 'id' => $model->id_incidencia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-incidencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
