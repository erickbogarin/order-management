<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Municipio */

$this->title = 'Novo Municipio';
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="municipio-create">

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
            <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?= $this->render('_form', [
        'model' => $model,
        'estados' => $estados
    ]) ?>

</div>
