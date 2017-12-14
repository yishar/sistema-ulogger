<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PositionsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="positions-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'track_id') ?>

    <?= $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'altitude') ?>

    <?php // echo $form->field($model, 'speed') ?>

    <?php // echo $form->field($model, 'bearing') ?>

    <?php // echo $form->field($model, 'accuracy') ?>

    <?php // echo $form->field($model, 'provider') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'image_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
