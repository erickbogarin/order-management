<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'clien_codigo') ?>

    <?= $form->field($model, 'clien_nome') ?>

    <?= $form->field($model, 'clien_tipo') ?>

    <?= $form->field($model, 'clien_cpf_cnpj') ?>

    <?= $form->field($model, 'clien_email') ?>

    <?php // echo $form->field($model, 'muni_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
