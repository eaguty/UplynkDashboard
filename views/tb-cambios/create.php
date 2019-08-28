<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbCambios */

$this->title = 'Crear un Cambio';
$this->params['breadcrumbs'][] = ['label' => 'Cambios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-cambios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
