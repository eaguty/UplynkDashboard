<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbIncidencias */

$this->title = $model->id_incidencia;
$this->params['breadcrumbs'][] = ['label' => 'Incidencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-incidencias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_incidencia',
            'fecha',
            'hora',
            'evento_programa',
            'cliente',
            'area_cliente',
            'responsable0.fullName',
            'estado',
            'detalle',
            'solucion',
        ],
    ]) ?>

</div>
