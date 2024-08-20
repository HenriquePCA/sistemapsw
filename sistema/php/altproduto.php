<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Alterar Produto</title>
    <style>

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

a:-webkit-any-link {
    cursor: pointer;
    text-decoration: none;
}

h3{

    color: white;
    text-align: center;
    margin-top: 140px;
}



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

        form {
          margin-top: 100px;
          width: 50%;
          display: flex;
          flex-direction: column;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"],
        input[type="tel"] {
            width: 30%%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            border: 1px solid #f2f2f2;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: rgb(0, 51, 160);
            color: white;
            border: none;
            padding: 12px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 12px 0;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            transition: 0.3s;

            
        }

        input[type="submit"]:hover {
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
<?php

    require_once('conexao.php');
   
    $id = $_POST['id'];
    $sql = "SELECT * FROM produto WHERE id = :id";
    $retorno = $conexao->prepare($sql);
    $retorno->bindParam(':id', $id, PDO::PARAM_INT);
    $retorno->execute();
    $array_retorno = $retorno->fetch();
   
    $modelo = $array_retorno['modelo'];
    $marca = $array_retorno['marca'];
    $ano = $array_retorno['ano'];
    $cor = $array_retorno['cor'];
    $tipo = $array_retorno['tipo'];
    $preco = $array_retorno['preco'];
    $imagem = $array_retorno['imagem'];
?>


<form class="alterar" method="POST" action="alterproduto.php">
    <input type="text" name="modelo" id="modelo" value="<?php echo $modelo ?>" required>
    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
    <input type="text" name="marca" id="marca" value="<?php echo $marca ?>" required>
    <input type="number" name="ano" id="ano" value="<?php echo $ano ?>" required>
    <input type="text" name="cor" id="cor" value="<?php echo $cor ?>" required>
    <input type="text" name="tipo" id="tipo" value="<?php echo $tipo ?>" required>
    <input type="number" name="preco" id="preco" value="<?php echo $preco ?>" required>
    <input type="file" name="imagem" id="imagem" value="<?php echo $imagem ?>" required>
    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>
