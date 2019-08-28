<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbEventos */

$this->title = 'Update Tb Eventos: ' . $model->id_evento;
$this->params['breadcrumbs'][] = ['label' => 'Tb Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_evento, 'url' => ['view', 'id' => $model->id_evento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-eventos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
