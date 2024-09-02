<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        .dropdown {
            position: relative;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            left: 0;
            background-color: black;
            min-width: 160px;
            z-index: 1;
            flex-direction: column;
        }
        
        .dropdown-content a {
            color: rgb(255, 255, 255);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        
        .dropdown-content a:hover {
            background-color: transparent;
            
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }

        .icones img {
            width: 40px;
            padding-right: 10px;
        }
        
            </style>
    <link rel="stylesheet" href="../css/style1.css">
    <script>
        function confirmarExclusao(id) {
            return confirm('Quer mesmo excluir a compra de ID ' + id + '?');
        }
    </script>
    <title>Lista de Compras</title>
</head>
<body>
<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a>
                <div class="dropdown">
                <a href="produtos.php">Produtos</a>
                <div class="dropdown-content">
                     <a href="cadastroproduto.php">Cadastro</a>
                     <a href="listaproduto.php">Lista</a>
                  </div>
                  </div>
                <div class="dropdown">
                  <a href="fornecedores.php">Fornecedores</a>
                    <div class="dropdown-content">
                     <a href="fornecedores.php">Cadastro</a>
                     <a href="listafornecedor.php">Lista</a>
                  </div>
                  </div>
                  <div class="dropdown">
                <a href="listamarcas.php">Marcas</a>
                <div class="dropdown-content">
                     <a href="cadastromarca.php">Cadastro</a>
                     <a href="listamarcas.php">Lista</a>
                  </div>
                  </div>
                <a href="sobre.php">Sobre</a>
                <a href="../php/cadastro.php">Cadastre-se</a>
            </div>

            <div class="icones">
                <a href="perfil.php"><img src="../img/login.png" alt=""></a>
                <a href="carrinho.php" class="social"><img src="../img/carrinho.png" alt=""></a>
            </div>
        </nav>
    </header>
<?php 
require_once('conexao.php');

$sql = "
   SELECT 
    compra.id,
    usuario.nome AS nome_usuario,
    produto.modelo AS modelo_produto,
    marca.nome AS nome_marca,
    fornecedor.nome AS nome_fornecedor,
    compra.total,
    compra.quantidade,
    compra.data,
    compra.hora
FROM compra
LEFT JOIN usuario ON compra.id_usuario = usuario.id
LEFT JOIN produto ON compra.id_produto = produto.id
LEFT JOIN marca ON compra.id_marca = marca.id
LEFT JOIN fornecedor ON compra.id_fornecedor = fornecedor.id;

";
$retorno = $conexao->prepare($sql);
$retorno->execute();
?>     

<h3>Lista de Compras</h3> 
<br><br>

<?php 
if ($retorno->rowCount() > 0) { 
?>

<table class="tabela-compras"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Produto</th>
            <th>Marca</th>
            <th>Total (R$)</th>
            <th>Quantidade</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        foreach($retorno->fetchAll(PDO::FETCH_ASSOC) as $value) { ?>
            <tr>
                <td><?php echo htmlspecialchars($value['id']); ?></td>
                <td><?php echo htmlspecialchars($value['nome_usuario']); ?></td>
                <td><?php echo htmlspecialchars($value['modelo_produto']); ?></td>
                <td><?php echo htmlspecialchars($value['nome_marca']); ?></td>
                <td>R$ <?php echo number_format($value['total'], 2, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($value['quantidade']); ?></td>
                <td><?php echo htmlspecialchars($value['data']); ?></td>
                <td><?php echo htmlspecialchars($value['hora']); ?></td>
                <td>
                    <form method="POST" action="deletecompra.php" onsubmit="return confirmarExclusao('<?php echo $value['id']; ?>')">
                        <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                        <button class="button" type="submit">Excluir</button>
                    </form>
                </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>

<?php 
} else {
    echo "<p>Nenhuma compra encontrada.</p>";
}
?>

<button class="button button3" style="display: block; margin: 20px auto;"><a href="index.php">Voltar</a></button>
</body>
</html>
