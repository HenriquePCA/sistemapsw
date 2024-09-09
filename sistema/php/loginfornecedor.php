<?php
session_start();
require_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        $erro = "Por favor, preencha todos os campos.";
    } else {
        
        $sql = "SELECT * FROM fornecedor WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$email]);
        $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fornecedor && password_verify($senha, $fornecedor['senha'])) {
            $_SESSION['fornecedor_id'] = $fornecedor['id'];
            $_SESSION['fornecedor_nome'] = $fornecedor['nome'];
            header("Location: perfilfornecedor.php");
            exit();
        } else {
            $erro = "Email ou senha inválidos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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

        h2{
            color: white;
            text-align: center;
            margin-top: 130px;
        }

        
.botao {
            display: flex;
            justify-content: center;
            align-items: center;
            
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
            margin: 10px 0;
            cursor: pointer;
            border-radius: 4px;
            width: 25%;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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


    <h2>Login de Fornecedor</h2> <a href="cadastrofornecedor.php" id="login" ><p>Ainda não é cadastrado? <span>Faça seu cadastro!</span></p></a>
    <?php if (isset($erro)): ?>
        <p id="p" style="text-align: center; color: red;"><?= $erro ?></p>
    <?php endif; ?>
    <div class="principal">
        <div class="formulario">
            <form action="loginfornecedor.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>
                <br>
                <div class="botao">
                    <button class="button" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
