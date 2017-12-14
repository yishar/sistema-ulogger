<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TracksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rutas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracks-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
  
    <p>
        <?= Html::a('Crear Ruta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            /*[
                'attribute' => 'user_id',
                'value' => function ($model){
                     $user1 = app\models\Users::findOne($model->id);
                     return $user1->login;
                },
            ],*/
            //'user_id',
            'name',
            'comment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
