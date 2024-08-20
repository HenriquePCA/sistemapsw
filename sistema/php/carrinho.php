<?php
session_start();

$carrinho = $_SESSION['carrinho'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #FFF;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #FFF;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #444;
        }

        .total {
            font-size: 24px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }

        .checkout {
            background-color: rgb(0, 51, 160);
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
            margin-top: 20px;
        }

        .checkout:hover {
            background-color: #FFF;
            color: rgb(0, 51, 160);
            border: 2px solid rgb(0, 51, 160);
        }
    </style>
</head>
<body>

<h1>Carrinho de Compras</h1>

<?php if (count($carrinho) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($carrinho as $item): 
                $subtotal = $item['preco'] * $item['quantidade'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['modelo']); ?></td>
                    <td><?php echo $item['quantidade']; ?></td>
                    <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></div>

    <button class="checkout">Finalizar Compra</button>

<?php else: ?>
    <p>Seu carrinho está vazio.</p>
<?php endif; ?>

</body>
</html>
