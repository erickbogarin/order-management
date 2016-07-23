<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-index">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                            <p>
                                <?= Html::a('Novo Estado', ['create'], ['class' => 'btn btn-success']) ?>
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

            'esta_codigo',
            'esta_nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
