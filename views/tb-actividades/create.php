<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbActividades */

$this->title = 'Crear Actividades';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-actividades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
