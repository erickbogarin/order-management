<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->errorSummary($model) ?>
    
    <?= $form->field($model, 'prod_nome')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'cate_codigo')->widget(Select2::classname(), [
        'data' => $categorias,
        'options' => ['placeholder' => 'Selecine uma categoria ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'fabr_codigo')->widget(Select2::classname(), [
        'data' => $fabricantes,
        'options' => ['placeholder' => 'Selecine um fabricante ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'prod_valor')->textInput() ?>

    <?= $form->field($model, 'prod_estoque')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
