<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function confirmarExclusao(nome) {
            return confirm('Quer mesmo excluir o usuário ' + nome + '?');
        }
    </script>
    <link rel="stylesheet" href="../css/style1.css">
    <style>
        
        .dropdown {
            position: relative;
        }
        .icones img {
            width: 40px;
            padding-right: 10px;
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
    <title>Lista de Usuários</title>
    
</head>
<body>

<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM usuario');
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
                <a href="perfiladm.php"><img src="../img/adm.png" alt=""></a>
                <a href="perfilfornecedor.php"><img src="../img/fornecedor.png" alt=""></a>
                <a href="perfil.php"><img src="../img/login.png" alt=""></a>
                <a href="carrinho.php" class="social"><img src="../img/carrinho.png" alt=""></a>
            </div>
        </nav>
    </header>
    

<h3>Lista de Usuários</h3>
<table> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data Nascimento</th>
            <th>Email</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['id'] ?></td> 
                <td><?php echo $value['nome'] ?></td> 
                <td><?php echo $value['telefone'] ?></td> 
                <td><?php echo $value['nascimento'] ?></td> 
                <td><?php echo $value['email'] ?></td> 
                <td>
                    <form method="POST" action="altcadastro.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                        <form method="POST" action="deleteUser.php" onsubmit="return confirmarExclusao('<?php echo htmlspecialchars($value['nome']); ?>')">
                            <input name="id" type="hidden" value="<?php echo htmlspecialchars($value['id']); ?>"/>
                            <button class="button" type="submit">Excluir</button>
                        </form>
                    </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>

<div style="display: flex; justify-content: center; gap: 20px; margin: 20px auto;">
  <button class="button button3">
    <a href="perfiladm.php">Voltar</a>
  </button>
  
</div>
</body>
</html>
