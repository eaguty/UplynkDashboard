<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbUsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-users-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tb Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_users',
            'username',
            'password',
            'nombre',
            'apellido',
            //'tipo',
            //'authkey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
