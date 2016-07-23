<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedido Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-produto-index">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                            <p>
                                <?= Html::a('Novo Ṕedido', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pepr_codigo',
            'pepr_nome',
            'pepr_quantidade',
            'pepr_valor',
            [
                'attribute' => 'prod_codigo',
                'value' => function ($data) {
                    return $data->produto->prod_nome;
                },
            ],
            Yii::$app->user->isGuest ?
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'] :
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}']
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
