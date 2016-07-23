<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                            <p>
                                <?= Html::a('Novo Cliente', ['create'], ['class' => 'btn btn-success']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        Pjax::begin();
        echo
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'clien_nome',
                    'clien_tipo',
                    'clien_cpf_cnpj',
                    'clien_email:email',
                    [
                        'attribute' => 'muni_codigo',
                        'value' => function ($data) {
                            return $data->municipio->muni_nome .
                            " - " . $data->municipio->estado->esta_nome;
                        },
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
        Pjax::end();
    ?>

</div>
