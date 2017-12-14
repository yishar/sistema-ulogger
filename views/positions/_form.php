<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Positions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="positions-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-12">

        <div class="col-sm-12">
            <div class="col-sm-6">

     <?php //echo $form->field($model, 'user_id')->textInput() ?>
    <?php 
    echo $form->field($model, 'user_id')->widget(Select2::classname(), [
    'data' => yii\helpers\ArrayHelper::map(app\models\users::find()->all(), 'id', 'login'),
    'language' => 'de',
    'options' => ['placeholder' => 'Seleccione el usuario ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    ?>
</div>
<div class="col-sm-6">
    <?php //echo $form->field($model, 'track_id')->textInput() ?>

    <?php 
    echo $form->field($model, 'track_id')->widget(Select2::classname(), [
    'data' => yii\helpers\ArrayHelper::map(app\models\tracks::find()->all(), 'id', 'name'),
    'language' => 'de',
    'options' => ['placeholder' => 'Seleccione la pista ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);
    ?>
    </div>
</div>
<div class="col-sm-3">
    <?= $form->field($model, 'time')->textInput() ?>
</div>
   <div class="col-sm-3">

    <?= $form->field($model, 'latitude')->textInput() ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'longitude')->textInput() ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'altitude')->textInput() ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'speed')->textInput() ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'bearing')->textInput() ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'accuracy')->textInput() ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'provider')->textInput(['maxlength' => true]) ?>
    </div>
<div class="col-sm-6">
    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
    </div>
<div class="col-sm-3">
    <?= $form->field($model, 'image_id')->textInput() ?>
    </div>
<div class="col-sm-3">
    <center>
        <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>
    </center>
    </div>
    <?php ActiveForm::end(); ?>

</div>
