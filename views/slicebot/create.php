<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Slicebot */

$this->title = 'Create Slicebot';
$this->params['breadcrumbs'][] = ['label' => 'Slicebots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slicebot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
