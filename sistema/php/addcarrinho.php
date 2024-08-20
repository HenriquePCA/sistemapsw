<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['quantidade'] += 1;
    } else {
        require_once('conexao.php');

        $sql = "SELECT * FROM produto WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto) {
            $_SESSION['carrinho'][$id] = [
                'modelo' => $produto['modelo'],
                'preco' => $produto['preco'],
                'quantidade' => 1
            ];
        }
    }

    header('Location: carrinho.php');
    exit();
} else {
    die('Produto inválido.');
}
?>
