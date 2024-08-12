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
    
</head>
<body>

<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a>
                <a href="produtos.php">Produtos</a>
                <a href="fornecedores.php">Fornecedores</a>
                <a href="fale.php">Fale conosco</a>
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
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if ($senha == $confirmar_senha) {
        $sql = "UPDATE usuario
                SET nome = '$nome', 
                    email = '$email',
                    nascimento = '$nascimento',
                    telefone = '$telefone',
                    senha = '$senha'
                WHERE id = '$id';";
        $sqlcombanco = $conexao->prepare($sql);

        if ($sqlcombanco->execute()) {
            echo "<h3>Ok!</h3> O usuário $nome foi alterado com sucesso!";
        }
    } else {
        echo "<h3>Erro!</h3> As senhas não coincidem, tente novamente.";
    }
    ?>
     <button class="button"><a href="listausuarios.php">Voltar</a></button>
</div>

</body>
</html>
