<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    $mensagem = "O usuário $nome foi incluído com sucesso.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <title>Cadastro de Admninistrador</title>
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

    <h1 id="titulo">Cadastre-se</h1>

<div class="principal">

        <div class="formulario">
            <h2>Dados cadastrais</h2>
            <form action="crudadm.php" method="post">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="cpf">CPF:</label>
                <input type="number" id="cpf" name="cpf" required>

                <label for="acesso">Acesso:</label>
                <input type="number" id="acesso" name="acesso" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" required>

                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">

                <label for="foto">Foto:</label>
                <input type="text" id="foto" name="foto">

                <button type="submit">Cadastrar</button>
            </form>
        </div>

    </div>
    

</body>
</html>