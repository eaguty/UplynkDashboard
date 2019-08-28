<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbEventos */

$this->title = $model->id_evento;
$this->params['breadcrumbs'][] = ['label' => 'Tb Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-eventos-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_evento',
            'programa',
            'senial',
            'clipping',
            'fecha',
            'horario_inicio',
            'horario_fin',
            'canal',
            'tipo',
            'area',
            'responsable0.fullName',
            'observaciones:ntext',
        ],
    ]) ?>

</div>
