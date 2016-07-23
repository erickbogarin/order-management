<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <?= $form->field($model, 'clien_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clien_tipo')->textInput() ?>

    <?= $form->field($model, 'clien_cpf_cnpj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clien_email')->textInput(['maxlength' => true]) ?>

    <?php
        $optEstado = $model->isNewRecord ? [] : [$model->municipio->estado->esta_codigo => ['selected ' => true]];
    ?>

    <?=  $form->field($model, 'esta_codigo')->dropDownList($estados, [
        'prompt'=>'Selecione um estado',
        'onchange'=>'
                $.get( "'.Url::toRoute('/cliente/municipio').'", { id: $(this).val() } )
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'muni_codigo').'" ).html( data );
                    }
                );
             ',
         'options' => $optEstado,
        ]
    );?>

    <?= $form->field($model, 'muni_codigo')->dropDownList([
            'prompt'=>'Selecione um estado'
        ]
    );?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
