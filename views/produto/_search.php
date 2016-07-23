<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prod_codigo') ?>

    <?= $form->field($model, 'prod_nome') ?>

    <?= $form->field($model, 'cate_codigo') ?>

    <?= $form->field($model, 'fabr_codigo') ?>

    <?= $form->field($model, 'prod_valor') ?>

    <?php // echo $form->field($model, 'prod_estoque') ?>

    <div class="form-group">
        <?= Html::submitButton('Procurar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
