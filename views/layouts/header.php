<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => '<i class="fa fa-envira text-success"></i> Pedidos',
        'brandOptions' => ['class' => 'brand'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            [
                'label' => 'Dashboard',
                'items' => [
                    '<li class="dropdown-header">Manter Pedidos</li>',
                    '<li class="divider"></li>',
                    ['label' => 'Pedidos', 'url' => Url::to('@web/pedido')],
                    ['label' => 'Pedidos Produtos', 'url' => Url::to('@web/pedidos')],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Manter Produtos</li>',
                    '<li class="divider"></li>',
                    ['label' => 'Produtos', 'url' => Url::to('@web/produto')],
                    ['label' => 'Categorias', 'url' => Url::to('@web/categoria')],
                    ['label' => 'Fabricantes', 'url' => Url::to('@web/fabricante')],
                ],
                'visible' => !(Yii::$app->user->isGuest)
            ],
            ['label' => 'Home', 'url' => ['/site/index'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Sobre', 'url' => ['/site/about'], 'visible' => Yii::$app->user->isGuest],
            ['label' => 'Contato', 'url' => ['/site/contact'], 'visible' => Yii::$app->user->isGuest],
            [
                'label' => 'Gerenciar',
                'items' => [
                    '<li class="dropdown-header">Pessoas</li>',
                    '<li class="divider"></li>',
                    ['label' => 'Clientes', 'url' => Url::to('@web/cliente')],
                    ['label' => 'Usuários', 'url' => Url::to('@web/usuario')],
                    '<li class="divider"></li>',
                    '<li class="dropdown-header">Localização</li>',
                    '<li class="divider"></li>',
                    ['label' => 'Municípios', 'url' => Url::to('@web/municipio')],
                    '<li class="divider"></li>',
                    ['label' => 'Estados', 'url' => Url::to('@web/estado')],
                ],
                'visible' => !(Yii::$app->user->isGuest)
            ],
            [
                'label' => 'Consultas',
                'items' => [
                    '<li class="dropdown-header">Relatórios</li>',
                    '<li class="divider"></li>',
                    ['label' => 'Estoque', 'url' => Url::to('@web/produto/relatorio')],
                    ['label' => 'Vendas', 'url' => Url::to('@web/pedido-produto/relatorio')],
                    '<li class="divider"></li>',
                    ['label' => 'Web API', 'url' => Url::to('@web/site/web-api')],
                ],
                'visible' => !(Yii::$app->user->isGuest)
            ],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->usua_nome . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);
    NavBar::end();
    ?>
</header>
