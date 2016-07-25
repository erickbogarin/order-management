<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                            <p>
                                <?= Html::a('Novo Pedido', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'style' => "cursor: pointer",
                'data-id' => $model->pedi_codigo,
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'clien_codigo',
                'value' => function ($data) {
                    return $data->cliente->clien_nome;
                },
            ],
            [
                'attribute' => 'usua_codigo',
                'value' => function ($data) {
                    return $data->usuario->usua_nome;
                },
            ],
            [
                'attribute' => 'fopa_codigo',
                'value' => function ($data) {
                    return $data->formaPagamento->fopa_nome;
                },
            ],
            Yii::$app->user->isGuest ?
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'] :
                ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<?php
$this->registerJs("
    $('tbody td').click(function (e) {
        var id = $(this).closest('tr').data('id');
        if (e.target == this)
            location.href = '" . Url::to(['pedido/view']) . "?id=' + id;
    });
");