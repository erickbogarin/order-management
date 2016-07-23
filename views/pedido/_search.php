<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pedi_codigo') ?>

    <?= $form->field($model, 'pedi_data_criacao') ?>

    <?= $form->field($model, 'pedi_data_alteracao') ?>

    <?= $form->field($model, 'clien_codigo') ?>

    <?= $form->field($model, 'usua_codigo') ?>

    <?php // echo $form->field($model, 'fopa_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
