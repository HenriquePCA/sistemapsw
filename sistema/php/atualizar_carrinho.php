<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['id']) && isset($_POST['acao'])) {
    $id = $_POST['id'];
    $acao = $_POST['acao'];

    if (isset($_SESSION['carrinho'][$id])) {
        if ($acao == 'incrementar') {
            $_SESSION['carrinho'][$id]++;
        } elseif ($acao == 'decrementar') {
            $_SESSION['carrinho'][$id]--;
            if ($_SESSION['carrinho'][$id] <= 0) {
                unset($_SESSION['carrinho'][$id]);
            }
        }
    }

    header('Location: carrinho.php');
    exit;
} else {
    echo "Ação ou ID do produto não especificados.";
}
?>
