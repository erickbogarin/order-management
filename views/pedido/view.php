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
                                    <?= Html::a('Editar', ['update', 'id' => $model->pedi_codigo], ['class' => 'btn btn-primary']) ?>
                                    <?= Html::a('Remover', ['delete', 'id' => $model->pedi_codigo], [
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
            'pepr_codigo',
            'pepr_nome',
            'pepr_quantidade',
            'pepr_valor',
        ]

    ?>

    <?php Pjax::begin(); ?>
        <?php
            echo GridView::widget([
                'id' => 'kv-grid-demo',
                'dataProvider'=> $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'containerOptions'=>['style'=>'overflow: auto'],
                'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                'pjax'=>true,
                'pjaxSettings'=>[
                    'neverTimeout'=>true,
                    'enablePushState' => false,
                    'options' => ['id' => 'BranchesGrid'],
                ],
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'floatHeader' => true,
                'toolbar'=> [
                    ['content'=>
                        Html::a('<i class="glyphicon glyphicon-plus"></i>',
                            Url::to([
                                'pedido-produto/create',
                                'pedido' => $model->pedi_codigo]),[
                            'type'=>'button',
                            'title'=>'Novo pedido',
                            'class'=>'btn btn-success',
                        ]) .
                        Html::a('<i class="glyphicon glyphicon-plus"></i>',
                            Url::to([
                                'pedido-produto/create',
                                'pedido' => $model->pedi_codigo]),
                            [
                                'type'=>'button',
                                'id' => 'pedidoModal',
                                'title'=>'Novo pedido',
                                'class'=>'btn btn-danger',
                            ]
                        )
                    ],

                ],
                'export'=>[
                    'fontAwesome'=>true
                ],
                'panel'=>[
                    'type'=>GridView::TYPE_PRIMARY,
                ],

            ]);
        ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
