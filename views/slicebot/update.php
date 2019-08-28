<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Slicebot */

$this->title = 'Update Slicebot: ' . $model->slicebot_id;
$this->params['breadcrumbs'][] = ['label' => 'Slicebots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->slicebot_id, 'url' => ['view', 'id' => $model->slicebot_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="slicebot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
