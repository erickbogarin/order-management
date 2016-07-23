<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FabricanteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fabricantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabricante-index">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                            <p>
                                <?= Html::a('Novo Fabricante', ['create'], ['class' => 'btn btn-success']) ?>
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

            'fabr_codigo',
            'fabr_nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
