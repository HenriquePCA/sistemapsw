<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <script>
        function confirmarExclusao(nome) {
            return confirm('Quer mesmo excluir a marca ' + nome + '?');
        }
    </script>
    <title>Lista de Marcas</title>
    <style>
        .tabela-fornecedores {
            width: 80%;
            margin: 0 auto;
            font-size: 12px;
        }

        .status-ativo {
            color: green;
        }

        .status-inativo {
            color: red;
        }
    </style>

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
</head>
<body>

<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM marca');
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
    

<h3>Lista de Marcas</h3> 
<br><br>

<?php 
if ($retorno->rowCount() > 0) { 
  
?>

<table class="tabela-fornecedores"> 
    <thead>
        <tr>
            <th>Nome</th>
            <th>Website</th>
            <th>Status</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        foreach($retorno->fetchAll(PDO::FETCH_ASSOC) as $value) { ?>
            <tr>
                <td><?php echo htmlspecialchars($value['nome']); ?></td>
                <td><?php echo htmlspecialchars($value['website']); ?></td>
                <td>
                    <form method="POST" action="alterar_status.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <select name="estatus" onchange="this.form.submit()" class="<?php echo ($value['estatus'] == 'ativo') ? 'status-ativo' : 'status-inativo'; ?>">
                            <option value="ativo" <?php if($value['estatus'] == 'ativo') echo 'selected'; ?>>Ativo</option>
                            <option value="inativo" <?php if($value['estatus'] == 'inativo') echo 'selected'; ?>>Inativo</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="POST" action="altmarca.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                        <form method="POST" action="deletemarca.php" onsubmit="return confirmarExclusao('<?php echo htmlspecialchars($value['nome']); ?>')">
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
    echo "<p>Nenhuma marca encontrada.</p>";
}
?>

<div style="display: flex; justify-content: center; gap: 20px; margin: 20px auto;">
  <button class="button button3">
    <a href="perfiladm.php">Voltar</a>
  </button>
  <button class="button button3">
    <a href="cadastromarca.php">Cadastro</a>
  </button>
</div>

</body>
</html>
