<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbTipoEventos */

$this->title = 'Update Tb Tipo Eventos: ' . $model->id_tipo_eventos;
$this->params['breadcrumbs'][] = ['label' => 'Tb Tipo Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_eventos, 'url' => ['view', 'id' => $model->id_tipo_eventos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-tipo-eventos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
