<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = 'Cadastrar Pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
        'fmaPagto' => $fmaPagto,
    ]) ?>

</div>
