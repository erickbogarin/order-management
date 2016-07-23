<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPagamento */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Forma Pagamento',
]) . $model->fopa_codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Forma Pagamentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fopa_codigo, 'url' => ['view', 'id' => $model->fopa_codigo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="forma-pagamento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
