<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Municipio */

$this->title = 'Update Municipio: ' . $model->muni_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Municipios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->muni_codigo, 'url' => ['view', 'id' => $model->muni_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="municipio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
