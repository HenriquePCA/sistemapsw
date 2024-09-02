<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

include("conexao.php");

$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM usuario WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$usuario_id]);
$usuario = $stmt->fetch();

$sql_compras = "SELECT c.id, c.total, c.quantidade, c.data, c.hora, p.modelo AS produto, m.nome AS marca
                FROM compra c
                JOIN produto p ON c.id_produto = p.id
                JOIN marca m ON c.id_marca = m.id
                WHERE c.id_usuario = ?";
$stmt_compras = $conexao->prepare($sql_compras);
$stmt_compras->execute([$usuario_id]);
$compras = $stmt_compras->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .icones img {
            width: 40px;
            padding-right: 10px;
        }

        h2{
            color: white;
            text-align: center;
            margin-top: 130px;
        }

        .infos{
             margin-left: 80px;
             margin-top: 50px;
             display: flex;
             flex-direction: column;
             color: white;
}


.botao {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10vh; 
        }
        .button {
            background-color: rgb(0, 51, 160);
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 0;
            cursor: pointer;
            border-radius: 4px;
            width: 10%;
            transition: 0.3s;
        }
        .button a {
            color: white;
            text-decoration: none;
        }

        .button:hover {
            background-color: transparent;
            border: 2px solid rgb(0, 51, 160);
        }
        
            </style>

    <title>Perfil</title>
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
    
    <h2>Perfil do Usuário</h2>
    <div class="infos">
    <p><strong>Nome:</strong> <?= $usuario['nome'] ?></p>
    <p><strong>Email:</strong> <?= $usuario['email'] ?></p>
    <p><strong>Data de Nascimento:</strong> <?= $usuario['nascimento'] ?></p>
    <p><strong>Telefone:</strong> <?= $usuario['telefone'] ?></p>
    </div>

    <h2>Minhas Compras</h2>
<?php if ($compras): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Marca</th>
                <th>Total</th>
                <th>Quantidade</th>
                <th>Data</th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?= htmlspecialchars($compra['id']) ?></td>
                    <td><?= htmlspecialchars($compra['produto']) ?></td>
                    <td><?= htmlspecialchars($compra['marca']) ?></td>
                    <td><?= htmlspecialchars($compra['total']) ?></td>
                    <td><?= htmlspecialchars($compra['quantidade']) ?></td>
                    <td><?= htmlspecialchars($compra['data']) ?></td>
                   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhuma compra registrada.</p>
<?php endif; ?>


  <div class="botao">
    <button class="button"><a href="logout.php">Sair</a></button> </div>
</body>
</html>
