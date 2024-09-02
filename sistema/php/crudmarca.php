<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Crud Marca</title>
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
require_once("conexao.php");

$nome= $_POST['nome'];
$website= $_POST['website'];
$estatus= $_POST['estatus'];



    $sql = "INSERT INTO marca (nome, website, estatus) VALUES ('$modelo', '$website', '$estatus')";
    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<div class='success-message'>";
        echo "<h3>Ok, a marca $nome foi incluída com sucesso!</h3>";
        echo "<a href='listamarcas.php' class='success-button'>Visualizar lista de marcas</a>";
        echo "</div>";
    }

    else {
        echo "<h3>A marca não foi inserida.</h3>";
    }

?>

</body>
</html>
