<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Pedidos Web API';
?>

<section id="page-breadcrumb">
    <div class="vertical-center sun">
        <div class="container">
            <div class="row">
                <div class="action">
                    <div class="col-sm-12">
                        <h1 class="title"><h1><?= Html::encode($this->title) ?></h1></h1>
                        <p>Our Web API lets your applications fetch data from the Pedidos catalog.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Web API Endpoint Reference</h2>
    </div>

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Web API Base URL: <code>http://localhost/pedido/web/</code></div>
        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>Método</th>
                <th>Endpoint</th>
                <th>Utilização</th>
                <th>Retorno</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>GET</td>
                <td><code>v1/produtos</code></td>
                <td>Listar Produtos</td>
                <td>application/json</td>
            </tr>
            <tr>
                <td>POST <small>AUTH</small></td>
                <td><code>v1/produtos</code></td>
                <td>Cadastrar Produto</td>
                <td>201</td>
            </tr>
            <tr>
                <td>PUT <small>AUTH</small></td>
                <td><code>v1/produtos</code></td>
                <td>Alterar Produto</td>
                <td>200</td>
            </tr>
            <tr>
                <td>DELETE <small>AUTH</small></td>
                <td><code>v1/produtos</code></td>
                <td>Deletar Produto</td>
                <td>200</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>