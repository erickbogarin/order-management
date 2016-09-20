<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estado */

$this->title = 'Update Estado: ' . $model->esta_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Estados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->esta_codigo, 'url' => ['view', 'id' => $model->esta_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
