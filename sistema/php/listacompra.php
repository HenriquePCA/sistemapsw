<?php
session_start();
require_once('conexao.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['usuario_id'];


$sql = "SELECT c.id, p.modelo AS produto, p.marca AS marca, f.nome AS fornecedor, c.total, c.quantidade, c.data, c.hora
        FROM compra c
        JOIN produto p ON c.id_produto = p.id
        JOIN fornecedor f ON c.id_fornecedor = f.id
        WHERE c.id_usuario = :id_usuario";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Compras</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
<main>
    <h1>Minhas Compras</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Marca</th>
                <th>Fornecedor</th>
                <th>Total</th>
                <th>Quantidade</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($compras): ?>
                <?php foreach ($compras as $compra): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($compra['id']); ?></td>
                        <td><?php echo htmlspecialchars($compra['produto']); ?></td>
                        <td><?php echo htmlspecialchars($compra['marca']); ?></td>
                        <td><?php echo htmlspecialchars($compra['fornecedor']); ?></td>
                        <td>R$ <?php echo number_format($compra['total'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($compra['quantidade']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($compra['data'])); ?></td>
                        <td><?php echo htmlspecialchars($compra['hora']); ?></td>
                    </tr>
                <?php endforeach; 
                ?>

                
            <?php else: ?>
                <tr>
                    <td colspan="8">Nenhuma compra realizada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="produtos.php" class="btn-continuar">Voltar aos Produtos</a>
</main>
</body>
</html>


