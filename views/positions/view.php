<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Positions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posiciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="positions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estás seguro que quieres eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'time',
            'user_id',
            'track_id',
            'latitude',
            'longitude',
            'altitude',
//            'speed',
//            'bearing',
//            'accuracy',
//            'provider',
//            'comment',
//            'image_id',
        ],
    ]) ?>

</div>
