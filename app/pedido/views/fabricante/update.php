<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fabricante */

$this->title = 'Editar Fabricante: ' . $model->fabr_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Fabricantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fabr_codigo, 'url' => ['view', 'id' => $model->fabr_codigo]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="fabricante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
