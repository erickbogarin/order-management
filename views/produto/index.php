<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                            <p>
                                <?php
                                    if(!(Yii::$app->user->isGuest)) :
                                         echo Html::a('Novo Produto', ['create'], [
                                            'class' => 'btn btn-success',
                                        ]);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'prod_nome',
            [
                'attribute' => 'cate_codigo',
                'value' => function ($data) {
                    return $data->categoria->cate_nome;
                },
            ],
            [
                'attribute' => 'fabr_codigo',
                'value' => function ($data) {
                    return $data->fabricante->fabr_nome;
                },
            ],
            'prod_valor',
            'prod_estoque',

            Yii::$app->user->isGuest ?
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'] :
                ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
</div>
