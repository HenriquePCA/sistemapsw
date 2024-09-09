<?php
session_start();
require_once('conexao.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "Seu carrinho está vazio!";
    exit;
}

$carrinho = $_SESSION['carrinho'];
$id_usuario = $_SESSION['usuario_id'];
$data = date('Y-m-d');
$hora = date('H:i:s');

try {
    $conexao->beginTransaction();

    foreach ($carrinho as $id_produto => $quantidade) {
        $sql = "SELECT p.preco, p.id AS id_produto, p.marca, p.fornecedor_id, m.id AS id_marca 
                FROM produto p 
                JOIN marca m ON p.marca = m.nome
                WHERE p.id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id_produto, PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produto) {
            $total = $produto['preco'] * $quantidade;
            $sql = "INSERT INTO compra (id_marca, id_usuario, id_produto, id_fornecedor, total, quantidade, data, hora)
                    VALUES (:id_marca, :id_usuario, :id_produto, :id_fornecedor, :total, :quantidade, :data, :hora)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':id_marca', $produto['id_marca']);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':id_produto', $produto['id_produto']);
            $stmt->bindParam(':id_fornecedor', $produto['fornecedor_id']);
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':hora', $hora);

            $stmt->execute();
        }
    }

    $conexao->commit();
    unset($_SESSION['carrinho']);
    header("Location: perfil.php");
    exit();
} catch (PDOException $e) {
    $conexao->rollBack();
    echo "Erro ao finalizar a compra: " . $e->getMessage();
    exit();
}
?>
