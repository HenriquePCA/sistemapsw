<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function confirmarExclusao(modelo) {
            return confirm('Quer mesmo excluir o produto ' + modelo + '?');
        }
    </script>
    <link rel="stylesheet" href="../css/style1.css">
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
        
            </style>
    <title>Lista de Produtos</title>
</head>
<body>

<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM produto');
$retorno->execute();
?>     

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
                <a href="#"><i class="fab fa-facebook-f" style="color: #F2F2F2;"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in" style="color: #F2F2F2;"></i></a>
            </div>
        </nav>
    </header>

<h3>Lista de Produtos</h3> <br> <br>
<table class="tabela-fornecedores" > 
    <thead>
        <tr>
       
        <th>Modelo</th>
            <th>Marca</th>
            <th>Ano</th>
            <th>Cor</th>
            <th>Tipo</th>
            <th>Preço</th>
        
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
          
            <td><?php echo $value['modelo']; ?></td>
                <td><?php echo $value['marca']; ?></td>
                <td><?php echo $value['ano']; ?></td>
                <td><?php echo $value['cor']; ?></td>
                <td><?php echo $value['tipo']; ?></td>
                <td><?php echo $value['preco']; ?></td>
                <td>
                    <form method="POST" action="altproduto.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                        <form method="POST" action="deleteproduto.php" onsubmit="return confirmarExclusao('<?php echo htmlspecialchars($value['modelo']); ?>')">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                            <button class="button" type="submit">Excluir</button>
                        </form>
                    </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>

<button class="button button3" style="display: block; margin: 20px auto;"><a href="index.php">Voltar</a></button>

</body>
</html>