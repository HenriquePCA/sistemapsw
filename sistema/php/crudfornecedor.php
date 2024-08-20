<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
    <style>
        .success-message {
            color: white;
            text-align: center;
            margin-top: 150px;
        }

        .success-button {
            display: block;
            margin: 30px auto;
            padding: 10px 20px;
            background-color: rgb(0, 51, 160);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            width: 300px;
        }

        .success-button:hover {
            background-color: transparent;
            border: 2px solid rgb(0, 51, 160);
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
        
            </style>
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
                <a href="listamarca.php">Marcas</a>
                <div class="dropdown-content">
                     <a href="cadastromarca.php">Cadastro</a>
                     <a href="listamarca.php">Lista</a>
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
<?php
require_once("conexao.php");

$nome= $_POST['nome'];
$cnpj= $_POST['cnpj'];
$endereco= $_POST['endereco'];
$cidade= $_POST['cidade'];
$estado= $_POST['estado'];
$cep= $_POST['cep'];
$telefone= $_POST['telefone'];
$email= $_POST['email'];
$representante= $_POST['representante'];
$senha= $_POST['senha'];
$confirmar_senha= $_POST['confirmar_senha'];

if ($senha == $confirmar_senha) {
    $sql = "INSERT INTO fornecedor (nome, cnpj, endereco, cidade, estado, cep, telefone, email, representante, senha) VALUES ('$nome', '$cnpj', '$endereco', '$cidade', '$estado', '$cep', '$telefone', '$email', '$representante', '$senha')";
    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<div class='success-message'>";
        echo "<h3>Ok, o fornecedor $nome foi incluído com sucesso!</h3>";
        echo "<a href='listafornecedor.php' class='success-button'>Visualizar lista de fornecedores</a>";
        echo "</div>";
    }
} else {
    echo "<div class='error-message'>";
    echo "<h3>Erro: As senhas não coincidem.</h3>";
    echo "</div>";
}
?>

</body>
</html>
