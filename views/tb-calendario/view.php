<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TbCalendario */

$this->title = $model->id_calendario;
$this->params['breadcrumbs'][] = ['label' => 'Tb Calendarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-calendario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
         if(Yii::$app->user->identity->id == 10){?>
            <?= Html::a('Update', ['update', 'id' => $model->id_calendario], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_calendario], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
         <?php    
            }

        ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_calendario',
            'titulo',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            'color',
            'url:url',
            'responsable0.fullName',
            'all_day',
        ],
    ]) ?>

</div>
