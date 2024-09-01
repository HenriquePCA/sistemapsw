<?php
require_once('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];

            header("Location: painel.php");
            exit();
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    } else {
        echo "Falha ao logar! E-mail ou senha incorretos";
    }
}
?>
