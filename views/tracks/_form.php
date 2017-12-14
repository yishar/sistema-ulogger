<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Tracks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tracks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'user_id')->textInput() ?>

<div class="col-sm-4">
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

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    

    <?php ActiveForm::end(); ?>

</div>
