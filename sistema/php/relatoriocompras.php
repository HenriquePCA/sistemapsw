<?php

session_start();
include("conexao.php");

if (!isset($_SESSION['fornecedor_id'])) {
    header("Location: loginfornecedor.php");
    exit();
}

$id_fornecedor = $_SESSION['fornecedor_id'];
echo "Fornecedor ID: " . $id_fornecedor; // Exibe o id do fornecedor para depuração

$sql = "SELECT c.id, c.total, c.quantidade, c.data, c.hora, p.modelo AS nome_produto, u.nome AS nome_usuario
        FROM compra c
        INNER JOIN produto p ON c.id_produto = p.id
        INNER JOIN usuario u ON c.id_usuario = u.id
        WHERE c.id_fornecedor = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id_fornecedor]);
$compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compras dos seus produtos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Lista de Compras</h1>

<?php if (count($compras) > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID da Compra</th>
                <th>Produto</th>
                <th>Comprador</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?= $compra['id'] ?></td>
                    <td><?= $compra['nome_produto'] ?></td>
                    <td><?= $compra['nome_usuario'] ?></td>
                    <td><?= $compra['quantidade'] ?></td>
                    <td>R$ <?= number_format($compra['total'], 2, ',', '.') ?></td>
                    <td><?= date('d/m/Y', strtotime($compra['data'])) ?></td>
                    <td><?= date('H:i', strtotime($compra['hora'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhuma compra encontrada.</p>
<?php endif; ?>

</body>
</html>
