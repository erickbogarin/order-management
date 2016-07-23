<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = 'Editar Produto: ' . $model->prod_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prod_codigo, 'url' => ['view', 'id' => $model->prod_codigo]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="produto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias,
        'fabricantes' => $fabricantes,
    ]) ?>

</div>
