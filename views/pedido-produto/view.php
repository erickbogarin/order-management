<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoProduto */

$this->title = $model->pepr_nome;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['pedido/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

        if(!Yii::$app->user->isGuest) :

    ?>

        <p>
            <?= Html::a('Deletar', ['delete', 'id' => $model->pepr_codigo], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    <?php

        endif;

    ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pepr_codigo',
            'pedi_codigo',
            'pepr_nome',
            'pepr_quantidade',
            'pepr_valor',
            [
                'attribute' => 'prod_codigo',
                'value' => $model->produto->prod_nome,
            ],
        ],
    ]) ?>

</div>
