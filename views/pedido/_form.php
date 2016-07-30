<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'clien_codigo')->widget(Select2::classname(), [
        'data' => $clientes,
        'options' => ['placeholder' => 'Selecine um cliente ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
        ],
        'addon' => [
            'prepend' => [
                'content' => '<span class="glyphicon glyphicon-user"></span>'
            ],
        ]
    ]);
    ?>


    <?= $form->field($model, 'fopa_codigo')->widget(Select2::classname(), [
        'data' => $fmaPagto,
        'options' => ['placeholder' => 'Selecine uma forma de pagamento ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'addon' => [
            'prepend' => [
                'content' => '<span class="glyphicon glyphicon-credit-card"></span>'
            ],
        ]
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
