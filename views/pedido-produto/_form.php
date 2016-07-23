<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProduto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-produto-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'pedi_codigo')->dropDownList(
        $pedidos, [
            'prompt' => 'Selecione a data de um pedido'
        ]
    );?>

    <?= $form->field($model, 'pepr_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prod_codigo')->dropDownList(
        $produtos, [
            'prompt' => 'Selecione um produto',
            'onchange'=>'
                $.get( "'.Url::toRoute('/pedido-produto/produto').'", { id: $(this).val() } )
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'pepr_quantidade').'" ).attr("placeholder", data );
                    }
                    
                );
             ',
        ]
    )?>

    <?= $form->field($model, 'pepr_quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
