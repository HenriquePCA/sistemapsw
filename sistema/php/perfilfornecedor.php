<?php
session_start();
include("conexao.php");
if (!isset($_SESSION['fornecedor_id'])) {
    header("Location: loginfornecedor.php");
    exit();
}
$id_fornecedor = $_SESSION['fornecedor_id'];
$sql = "SELECT nome, cnpj, endereco, cidade, estado, cep, telefone, email, representante FROM fornecedor WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id_fornecedor]);
$fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Fornecedor</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            margin-top: 150px;
        }

        .perfil-info {
            width: 30%;
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
        }

        .perfil-info h2 {
            margin-bottom: 20px;
        }

        .perfil-info p {
            margin: 10px 0;
        }

        .acoes {
            width: 65%;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .acao {
            width: 30%;
            height: 150px;
            background-color: #f0f0f0;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .acao button {
            background-color: rgb(0, 51, 160);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }

        .acao button:hover {
            background-color: #0044cc;
        }

        .icones img {
            width: 40px;
            padding-right: 10px;
        }
    </style>
</head>
<body>

<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a> 
                <a href="produtos.php">Produtos</a>
                <a href="fale.php">Fale conosco</a> 
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

<div class="container">
    <div class="perfil-info">
        <h2>Informações do Fornecedor</h2>
        <p><strong>Nome:</strong> <?= $fornecedor['nome'] ?></p>
        <p><strong>CNPJ:</strong> <?= $fornecedor['cnpj'] ?></p>
        <p><strong>Endereço:</strong> <?= $fornecedor['endereco'] . ', ' . $fornecedor['cidade'] . ', ' . $fornecedor['estado'] ?></p>
        <p><strong>CEP:</strong> <?= $fornecedor['cep'] ?></p>
        <p><strong>Telefone:</strong> <?= $fornecedor['telefone'] ?></p>
        <p><strong>Email:</strong> <?= $fornecedor['email'] ?></p>
        <p><strong>Representante:</strong> <?= $fornecedor['representante'] ?></p>
    </div>

   
    <div class="acoes">
       
        <div class="acao">
            <h3>Cadastrar Produto</h3>
            <button onclick="window.location.href='cadastroproduto.php'">ACESSAR</button>
        </div>
        <div class="acao">
            <h3>Relatório de Compras</h3>
            <button onclick="window.location.href='relatoriocompras.php'">ACESSAR</button>
        </div>

        <div class="acao">
            <h3>Encerrar Sessão</h3>
            <button onclick="window.location.href='logoutfornecedor.php'">Sair</button>
        </div>

        
    </div>
</div>

</body>
</html>
