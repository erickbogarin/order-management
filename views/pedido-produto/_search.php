<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pepr_codigo') ?>

    <?= $form->field($model, 'pedi_codigo') ?>

    <?= $form->field($model, 'pepr_nome') ?>

    <?= $form->field($model, 'pepr_quantidade') ?>

    <?= $form->field($model, 'pepr_valor') ?>

    <?php // echo $form->field($model, 'prod_codigo') ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
