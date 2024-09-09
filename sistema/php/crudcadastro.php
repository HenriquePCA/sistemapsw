<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Resultado</title>
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
<?php
require_once("conexao.php");

$nome= $_POST['nome'];
$email= $_POST['email'];
$data_nascimento= $_POST['data_nascimento'];
$telefone= $_POST['telefone'];
$senha= $_POST['senha'];
$confirmar_senha= $_POST['confirmar_senha'];

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

if ($senha == $confirmar_senha) {
    $sql = "INSERT INTO usuario (nome, email, nascimento, telefone, senha) VALUES ('$nome', '$email', '$data_nascimento', '$telefone', '$senha')";
    $sqlcombanco = $conexao->prepare($sql);

    if ($sqlcombanco->execute()) {
        echo "<div class='success-message'>";
        echo "<h3>Ok, o usuário $nome foi incluído com sucesso!</h3>";
        echo "<a href='listausuarios.php' class='success-button'>Visualizar lista de usuários</a>";
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

