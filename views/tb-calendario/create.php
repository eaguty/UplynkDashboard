<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TbCalendario */

$this->title = 'Calendario';
$this->params['breadcrumbs'][] = ['label' => 'Calendario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-calendario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
