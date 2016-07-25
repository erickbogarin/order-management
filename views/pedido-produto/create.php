<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PedidoProduto */

$this->title = 'Cadastrar Pedido Produto';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['pedido/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-produto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produtos' => $produtos,
    ]) ?>

</div>
