<?php
session_start();

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    if (!isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] = 1; 
    } else {
        $_SESSION['carrinho'][$id] += 1; 
    }

    header('Location: carrinho.php');
    exit;
} else {
    echo "ID do produto não fornecido ou vazio!";
    exit;
}
?>
