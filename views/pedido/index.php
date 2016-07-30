<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

<?php
    $gridColumns = [
        [
            'attribute' => 'clien_nome',
            'label' => 'Cliente',
            'headerOptions'=>['class'=>'text-center'],
            'contentOptions' => ['class' => 'text-center col-md-5'],
            'value' => function ($data) {
                return $data->cliente->clien_nome;
            },
        ],
        [
            'attribute' => 'fopa_codigo',
            'headerOptions'=>['class'=>'text-center'],
            'contentOptions' => ['class' => 'text-center'],
            'value' => function ($data) {
                return $data->formaPagamento->fopa_nome;
            },
        ],
        [
            'attribute' => 'pedi_data_criacao',
            'label' => 'Data de Criação',
            'headerOptions'=>['class'=>'text-center'],
            'contentOptions' => ['class' => 'text-center'],
            'value' => function ($data) {
                return Yii::$app->formatter->asDatetime($data->pedi_data_criacao);
            },
        ],
        Yii::$app->user->isGuest ?
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'] :
            ['class' => 'yii\grid\ActionColumn']
    ];
?>


<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th"></i> Últimos Pedidos</h3>',
            'type'=>'default',
            'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Novo Pedido', ['create'], ['class' => 'btn btn-success']),
            'footer'=>false
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'toolbar'=> [],
        'columns' => $gridColumns,
        // Allow click on rows
        'rowOptions' => function ($model, $key, $index, $grid) {
            return [
                'style' => "cursor: pointer",
                'data-id' => $model->pedi_codigo,
            ];
        },
        'export'=>[
            'fontAwesome'=>true
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