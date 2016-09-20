

<table class="table table-bordered" style="width:100%">
    <caption>Resumo de Estoque dos Produtos</caption>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Fabricante</th>
        <th>Estoque</th>
    </tr>

    <?php foreach($produtos as $produto): ?>
        <tr>
            <td><?= $produto->prod_codigo ?></td>
            <td><?= $produto->prod_nome ?></td>
            <td><?= $produto->fabricante->fabr_nome ?></td>
            <td><?= $produto->prod_estoque ?></td>
        </tr>
    <?php endforeach; ?>

</table>
