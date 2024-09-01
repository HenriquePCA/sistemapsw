<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Exclusão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        header {
            text-decoration: none;
            background-color: black;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            font-weight: 700;
            z-index: 1000; 
        }

        header nav {
            width: 90%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100px;
        }

        header nav #logo {
            margin-top: 5px;
            width: 150px;
        }

        header nav .menu {
            display: flex;
            align-items: center;
        }

        header nav .menu a {
            color: #F2F2F2;
            margin-left: 30px;
            position: relative;
        }

        header nav .menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: rgb(0, 51, 160);
            transition: 0.4s;
        }

        header nav .menu a:hover::after {
            width: 100%;
        }

        header nav .icones a i {
            font-size: 22px;
            margin-left: 10px;
        }

        header nav .icones a i:hover {
            transform: scale(1.3);
            color: rgb(0, 51, 160);
            transition: 0.3s;
        }

        .message-box {
            color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        h3 {
            color: white;
            margin-bottom: 20px;
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
            width: 60%;
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

    <div class="message-box">
    <?php
    require_once("conexao.php");

    $id = $_POST['id'];

    // Primeiro, precisamos obter o nome da marca com base no ID
    $sqlNomeMarca = "SELECT nome FROM marca WHERE id = :id";
    $stmtNomeMarca = $conexao->prepare($sqlNomeMarca);
    $stmtNomeMarca->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtNomeMarca->execute();
    $nomeMarca = $stmtNomeMarca->fetchColumn();

    if ($nomeMarca) {
        // Agora verificamos se há produtos associados a essa marca pelo nome
        $sqlVerifica = "SELECT COUNT(*) FROM produto WHERE marca = :nomeMarca";
        $stmtVerifica = $conexao->prepare($sqlVerifica);
        $stmtVerifica->bindParam(':nomeMarca', $nomeMarca, PDO::PARAM_STR);
        $stmtVerifica->execute();
        $quantidadeProdutos = $stmtVerifica->fetchColumn();

        if ($quantidadeProdutos > 0) {
            echo "<h3>Erro!</h3> Não foi possível excluir a marca, pois existem $quantidadeProdutos produto(s) associado(s).";
        } else {
            // Se não houver produtos associados, exclui a marca
            $sqlDelete = "DELETE FROM marca WHERE id = :id";
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmtDelete->execute()) {
                echo "<h3>Marca excluída com sucesso!</h3>";
            } else {
                echo "<h3>Erro!</h3> Não foi possível excluir a marca.";
            }
        }
    } else {
        echo "<h3>Erro!</h3> Marca não encontrada.";
    }
    ?>
    <button class="button"><a href="listamarcas.php">Voltar</a></button>
</div>
</body>
</html>
