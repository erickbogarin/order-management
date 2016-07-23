<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = $model->usua_nome;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->usua_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Alterar', ['delete', 'id' => $model->usua_codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'usua_codigo',
            'usua_nome',
            'usua_email:email',
            'usua_senha',
            'usua_tipo',
            'usua_habilitado:boolean',
            'usua_auth_key',
        ],
    ]) ?>

</div>
