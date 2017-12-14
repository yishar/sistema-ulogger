<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <div class="row">

        <?php echo \navatech\roxymce\widgets\RoxyMceWidget::widget([
                    'name' => 'Post[content]'
                ]);
        ?>

        <?php
        	echo \navatech\roxymce\widgets\RoxyMceWidget::widget([
    			'model'     => app\models\Post::findOne(1),
    			'attribute' => 'nombre',
]);
        ?>
        </div>
</div>
