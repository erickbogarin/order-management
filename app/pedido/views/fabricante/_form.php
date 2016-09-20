<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fabricante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fabricante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model) ?>
    
    <?= $form->field($model, 'fabr_nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Editar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
