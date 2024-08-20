<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Alteração</title>
    <style>
              body {
            font-family: Arial, sans-serif;
            text-decoration: none;
            background-color: black;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            content: '' ;
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
            text-align: center;
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

<div class="message-box">
    <?php
    require_once("conexao.php");
    $id = $_POST['id'];
    $modelo= $_POST['modelo'];
    $marca= $_POST['marca'];
    $ano= $_POST['ano'];
    $cor= $_POST['cor'];
    $tipo= $_POST['tipo'];
    $preco= $_POST['preco'];
    $imagem= $_POST['imagem'];

    if ($id == $id) {
        $sql = "UPDATE produto
        SET modelo = '$modelo', 
            marca = '$marca',
            ano = '$ano',
            cor = '$cor',
            tipo = '$tipo',
            preco = '$preco',
            imagem = '$imagem'
        WHERE id = '$id';";

        $sqlcombanco = $conexao->prepare($sql);

        if ($sqlcombanco->execute()) {
            echo "<h3>Ok!</h3> O modelo $modelo foi alterado com sucesso!";
        }
    } else {
        echo "<h3>Erro!</h3> Não foi possível alterar, tente novamente.";
    }
    ?>
     <button class="button"><a href="listaproduto.php">Voltar</a></button>
</div>

</body>
</html>
