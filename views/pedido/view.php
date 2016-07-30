<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->cliente->clien_nome;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-view">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1><?= Html::encode($this->title) ?></h1>


                            <?php

                                if(!Yii::$app->user->isGuest) :

                             ?>

                                <p>
                                    <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Editar', ['update', 'id' => $model->pedi_codigo], ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Remover', ['delete', 'id' => $model->pedi_codigo], [
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'pedi_data_alteracao',
                'value' => Yii::$app->formatter->asDatetime($model->pedi_data_alteracao),
            ],
            [
                'attribute' => 'clien_codigo',
                'value' => $model->cliente->clien_nome,
            ],
            [
                'attribute' => 'usua_codigo',
                'value' => $model->usuario->usua_nome,
            ],
            [
                'attribute' => 'fopa_codigo',
                'value' => $model->formaPagamento->fopa_nome,
            ],
        ],
    ]) ?>


    <?php
        $gridColumns = [
            [
                'attribute' => 'pepr_codigo',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center col-md-1'],
            ],
            [
                'attribute' => 'pepr_nome',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center col-md-6'],
            ],
            [
                'attribute' => 'pepr_quantidade',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center col-md-1'],
            ],
            [
                'attribute' => 'pepr_valor',
                'headerOptions'=>['class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                            Url::to(['pedido-produto/view', 'id' => $model->pepr_codigo]),
                            ['title' => Yii::t('yii', 'Ver mais'),]);
                    },
                ]
            ],
        ]

    ?>

    <?php Pjax::begin(); ?>
        <?php
            echo GridView::widget([
                'id' => 'kv-grid-demo',
                'dataProvider'=> $dataProvider,
                'filterModel' => $searchModel,
                'panel' => [
                    'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th"></i> Pedidos do Cliente</h3>',
                    'type'=>'success',
                    'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Criar Pedido',
                        Url::to([
                            'pedido-produto/create',
                            'pedido' => $model->pedi_codigo]),[
                            'type'=>'button',
                            'title'=>'Novo pedido',
                            'class'=>'btn btn-primary',
                        ]),
                    'footer'=>false
                ],
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'floatHeader' => true,
                'containerOptions'=>['style'=>'overflow: auto'],
                'toolbar'=> [],
                // Columns
                'columns' => $gridColumns,
                'export'=>[
                    'fontAwesome'=>true
                ],
            ]);
        ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
