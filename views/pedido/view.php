<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->pedi_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

        if(!Yii::$app->user->isGuest) :

    ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pedi_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pedi_codigo], [
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
            'pedi_codigo',
            'pedi_data_criacao',
            'pedi_data_alteracao',
            'clien_codigo',
            'usua_codigo',
            'fopa_codigo',
        ],
    ]) ?>

</div>
