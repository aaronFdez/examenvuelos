<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VueloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vuelo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_vuelo') ?>

    <?= $form->field($model, 'orig_id') ?>

    <?= $form->field($model, 'dest_id') ?>

    <?= $form->field($model, 'comp_id') ?>

    <?php // echo $form->field($model, 'salida') ?>

    <?php // echo $form->field($model, 'llegada') ?>

    <?php // echo $form->field($model, 'plazas') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
