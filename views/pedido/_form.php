<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'clien_codigo')->dropDownList(
           $clientes, [
               'prompt' => 'Selecione um cliente'
            ]

    ) ?>

    <?= $form->field($model, 'fopa_codigo')->dropDownList(
        $fmaPagto,
        [
            'prompt' => 'Selecione uma forma de pagamento'
        ]
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
