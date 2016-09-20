<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usua_nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usua_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usua_senha')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usua_tipo')->textInput() ?>

    <?= $form->field($model, 'usua_habilitado')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
