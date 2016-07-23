<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Treinamento Divus';
?>

<section id="home-slider">
    <div class="container">
        <div class="row">
            <div class="main-slider">
                <div class="slide-text">
                    <h1>Descobrir e Comprar</h1>
                    <p>Boudin doner frankfurter pig. Cow shank bresaola pork loin tri-tip tongue venison pork belly meatloaf short loin landjaeger biltong beef ribs shankle chicken andouille.</p>
                    <?= Html::a('Produtos', ['produto/index'], ['class' => 'btn btn-common']) ?>
                </div>
                <?= Html::img('@web/images/home/slider/hill.png', [
                        'class' => 'slider-hill',
                        'alt' => 'slider image'
                ]);?>
                <?= Html::img('@web/images/home/slider/house.png', [
                    'class' => 'slider-hill',
                    'alt' => 'slider image'
                ]);?>
                <?= Html::img('@web/images/home/slider/sun.png', [
                    'class' => 'slider-hill',
                    'alt' => 'slider image'
                ]);?>
                <?= Html::img('@web/images/home/slider/birds1.png', [
                    'class' => 'slider-hill',
                    'alt' => 'slider image'
                ]);?>
                <?= Html::img('@web/images/home/slider/birds2.png', [
                    'class' => 'slider-hill',
                    'alt' => 'slider image'
                ]);?>
            </div>
        </div>
    </div>
    <div class="preloader"><i class="fa fa-sun-o fa-spin"></i></div>
</section>
<!--/#home-slider-->

<div id="feature-container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Informações Coorporativas</h2>
        </div>
        <div class="col-sm-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
            <div class="feature-inner">
                <div class="icon-wrapper">
                    <i class="fa fa-2x fa-shopping-bag"></i>
                </div>
                <h2>Consulta de Estoque</h2>
                <p>Ground round tenderloin flank shank ribeye. Hamkevin meatball swine.</p>
            </div>
        </div>
        <div class="col-sm-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="600ms">
            <div class="feature-inner">
                <div class="icon-wrapper">
                    <i class="fa fa-2x fa-users"></i>
                </div>
                <h2>Nosso Clientes</h2>
                <p>Ground round tenderloin flank shank ribeye. Hamkevin meatball swine.</p>
            </div>
        </div>
        <div class="col-sm-4 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="900ms">
            <div class="feature-inner">
                <div class="icon-wrapper">
                    <i class="fa fa-2x fa-list-alt"></i>
                </div>
                <h2>Relatórios de Vendas</h2>
                <p>Ground round tenderloin flank shank ribeye. Hamkevin meatball swine.</p>
            </div>
        </div>
        </div>
    </div>

<section id="action" class="responsive">
    <div class="vertical-center">
        <div class="container">
            <div class="row">
                <div class="action take-tour">
                    <div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h1 class="title">Pedidos Web API</h1>
                        <p>A responsive, retina-ready &amp; wide multipurpose template.</p>
                    </div>
                    <div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="tour-button">
                            <?= Html::a('SAIBA MAIS', ['site/web-api'], ['class' => 'btn btn-common']) ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#action-->