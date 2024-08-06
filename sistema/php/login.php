<?php
include('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(empty($_POST['email'])) {
        echo "Preencha seu e-mail";
    } else if(empty($_POST['senha'])) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Usando prepared statements para prevenir SQL injection
        $sql_code = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $mysqli->prepare($sql_code);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $sql_query = $stmt->get_result();

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
            exit(); // Garante que o código pare de executar após o redirecionamento
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


    <h1 id="titulo">Faça seu login</h1>

<div class="principal">

        <div class="formulario">
            <h2>Insira seus dados:</h2>
            <form action="painel.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit">Entrar</button>
            </form>
        </div>

    </div>
    

</body>
</html>