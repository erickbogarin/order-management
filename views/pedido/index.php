<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
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
                'header' => 'PedidoProdutos',
                'attribute'=>'pepr_nome',
                'value' => function ($model, $key, $index) {
                    return $model->pedidos;
                },
            ],
            // 'fopa_codigo',

            Yii::$app->user->isGuest ?
                ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'] :
                ['class' => 'yii\grid\ActionColumn']
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
