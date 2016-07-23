<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = $model->prod_nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

        if(!Yii::$app->user->isGuest) :

    ?>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->prod_codigo], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->prod_codigo], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    <?php

        endif;

    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prod_codigo',
            'prod_nome',
            'cate_codigo',
            'fabr_codigo',
            'prod_valor',
            'prod_estoque',
        ],
    ]) ?>

</div>
