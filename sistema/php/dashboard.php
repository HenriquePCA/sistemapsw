<?php
session_start();

if (!isset($_SESSION['fornecedor_id'])) {
    header('Location: loginfornecedor.php');
    exit();
}

echo "<h1>Bem-vindo, " . $_SESSION['fornecedor_nome'] . "!</h1>";
echo "<a href='logoutfornecedor.php'>Sair</a>";
?>
