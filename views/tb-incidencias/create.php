<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbIncidencias */

$this->title = 'Crear Incidencia';
$this->params['breadcrumbs'][] = ['label' => 'Incidencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-incidencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
