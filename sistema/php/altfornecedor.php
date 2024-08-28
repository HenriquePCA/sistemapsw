<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        label{
            color: white;
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

        #h2{
            color: white;
            text-align: center;
            margin-top: 450px;
            margin-bottom: 60px;
        }
        
            </style>
</head>
    <title>Alterar Cadastro de Fornecedor</title>
</head>
<body>

<header>
    <nav>
        <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt=""></a>
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
$sql = "SELECT * FROM fornecedor WHERE id = :id";
$retorno = $conexao->prepare($sql);
$retorno->bindParam(':id', $id, PDO::PARAM_INT);
$retorno->execute();
$array_retorno = $retorno->fetch(PDO::FETCH_ASSOC);

?>


<form class="alterar" method="POST" action="alterfornecedor.php">
    <h2 id="h2">Alterar dados do fornecedor</h2>
    <label for="nome">Nome da Empresa:</label>
    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($array_retorno['nome']); ?>" required>

    <label for="cnpj">CNPJ:</label>
    <input type="text" name="cnpj" id="cnpj" value="<?php echo htmlspecialchars($array_retorno['cnpj']); ?>" required>

    <label for="endereco">Endereço:</label>
    <input type="text" name="endereco" id="endereco" value="<?php echo htmlspecialchars($array_retorno['endereco']); ?>" required>

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" id="cidade" value="<?php echo htmlspecialchars($array_retorno['cidade']); ?>" required>

    <label for="estado">Estado:</label>
    <input type="text" name="estado" id="estado" value="<?php echo htmlspecialchars($array_retorno['estado']); ?>" required>

    <label for="cep">CEP:</label>
    <input type="text" name="cep" id="cep" value="<?php echo htmlspecialchars($array_retorno['cep']); ?>" required>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" id="telefone" value="<?php echo htmlspecialchars($array_retorno['telefone']); ?>" required>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($array_retorno['email']); ?>" required>

    <label for="representante">Nome do Representante:</label>
    <input type="text" name="representante" id="representante" value="<?php echo htmlspecialchars($array_retorno['representante']); ?>" required>

    <input name="id" type="hidden" value="<?php echo htmlspecialchars($array_retorno['id']); ?>" />

    <input type="submit" name="update" value="Alterar">
</form>

</body>
</html>


