<?php

$resultado = array();

if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
    require_once 'search.php';
    $search = new Search('produtos.csv');

    $resultado = $search->item($_POST['codigo']);
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <form method="post" action="index.php">
            <div class="form-group">
                <input type="text" name="codigo" value="" />
                <input type="submit" value="Consultar...">
            </div>

        </form>

        <?php if (isset($_POST['codigo'])): ?>
        <h1>Resultado de Busca</h1>
        <?php if (!empty($resultado)): ?>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">Cód. Cliente</th>
                    <th scope="col">Nome Fant.</th>
                    <th scope="col">Mens. Entrega</th>
                    <th scope="col">Rota</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $item): ?>
                <tr>
                    <td><?= $item->codigo ?></td>
                    <td><?= $item->nome ?></td>
                    <td><a
                            href=https://wa.me/<?= $item->medida ?>?text=Aqui%20é%20a%20equipe%20de%20entrega%20da%20Mário%20Louças.%20Sua%20entrega%20será%20a%20próxima!>Mandar
                            Mensagem</a></td>
                    <td><a href=<?= $item->preco ?>>Seguir Rota</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>
        <h3><b>
                <font color=red>Código não encontrado - verifique se foi digitado corretamente</font>
            </b></h3>
        </p>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>