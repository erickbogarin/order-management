<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = 'Editar Pedido: ' . $model->pedi_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pedi_codigo, 'url' => ['view', 'id' => $model->pedi_codigo]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
        'fmaPagto' => $fmaPagto
    ]) ?>

</div>
