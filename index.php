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
 
</head>
<body>

<font face=Arial>
<form method="post" action="index.php">
   
<br>
<br>
               <input type="text" name="codigo" value=""/>
        </label>
        <input type="submit" value="Consultar...">
  
</form>

<?php if (isset($_POST['codigo'])): ?>
    <h1>Resultado de Busca</h1>
    <?php if (!empty($resultado)): ?>
        <table border="1">
            <thead>
            <tr>
                <th>Cód. Cliente</th>
                <th>Nome Fant.</th>
                <th>Mens. Entrega</th>
                <th>Rota</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultado as $item): ?>
                <tr>
                    <td><?= $item->codigo ?></td>
                    <td><?= $item->nome ?></td>
                    <td><a href=https://wa.me/<?= $item->medida ?>?text=Aqui%20é%20a%20equipe%20de%20entrega%20da%20Mário%20Louças.%20Sua%20entrega%20será%20a%20próxima!>Mandar Mensagem</a></td>
                    <td><a href=<?= $item->preco ?>>Seguir Rota</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p><h3><b><font color=red>Código não encontrado - verifique se foi digitado corretamente</font></b></h3></p>
    <?php endif; ?>
<?php endif; ?>
</font>
</body>
</html>