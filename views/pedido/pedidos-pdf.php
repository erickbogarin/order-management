

<table class="table table-bordered" style="width:100%">
    <caption>Resumo de Pedidos Realizados</caption>
    <tr>
        <th>Código</th>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Ciente</th>
        <th>Data</th>
    </tr>

    <?php foreach($pedidos as $pedido): ?>
        <tr>
            <td><?= $pedido->pedi_codigo ?></td>
            <td><?= $pedido->produto->prod_nome ?></td>
            <td><?= $pedido->pepr_quantidade ?></td>
            <td><?= $pedido->pedido->cliente->clien_nome ?></td>
            <td><?= Yii::$app->formatter->asDatetime($pedido->pedido->pedi_data_criacao, 'php:d/M/Y H:i'); ?></td>
        </tr>
    <?php endforeach; ?>

</table>
