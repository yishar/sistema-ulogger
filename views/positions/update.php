<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Positions */

$this->title = 'Actualizar posición: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posiciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="positions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
