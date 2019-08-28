<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbCambios */

$this->title = $model->id_cambios;
$this->params['breadcrumbs'][] = ['label' => 'Tb Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cambios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cambios], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cambios], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cambios',
            'tema',
            'descripcion',
            'importancia',
            'last_update',
        ],
    ]) ?>

</div>
