<?php
require_once('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM fornecedor WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$email]);
    $fornecedor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($fornecedor && password_verify($senha, $fornecedor['senha'])) {
        session_start();
        $_SESSION['fornecedor_id'] = $fornecedor['id'];
        $_SESSION['fornecedor_nome'] = $fornecedor['nome'];
        $_SESSION['email'] = $fornecedor['email'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Falha ao logar! E-mail ou senha incorretos";
    }
}
