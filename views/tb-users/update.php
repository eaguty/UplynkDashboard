<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TbUsers */

$this->title = 'Update Tb Users: ' . $model->id_users;
$this->params['breadcrumbs'][] = ['label' => 'Tb Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_users, 'url' => ['view', 'id' => $model->id_users]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-users-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
