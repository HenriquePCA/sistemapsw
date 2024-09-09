<?php
session_start();
require_once('conexao.php');

date_default_timezone_set('America/Sao_Paulo');


if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    echo "Seu carrinho está vazio!";
    exit;
}

$carrinho = $_SESSION['carrinho'];
$total = 0; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <style>
        .dropdown { position: relative; }
        .dropdown-content {
            display: none;
            position: absolute;
            left: 0;
            background-color: black;
            min-width: 160px;
            z-index: 1;
            flex-direction: column;
        }
        .dropdown-content a {
            color: rgb(255, 255, 255);
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover { background-color: transparent; }
        .dropdown:hover .dropdown-content { display: block; }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0; 
        }
        .btn-finalizar, .btn-continuar {
            background-color: rgb(0, 51, 160);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            border: 2px solid rgb(0, 51, 160);
            transition: 0.3s;
            margin: 0 10px; 
        }
        .btn-finalizar:hover, .btn-continuar:hover {
            background-color: transparent;
            color: rgb(0, 51, 160);
        }
        .icones img {
            width: 40px;
            padding-right: 10px;
        }

        #botao{
            background-color: transparent;
            color:rgb(0, 51, 160);
            font-size: 20px;
            margin-right: 10px;
            margin-left: 10px;
            border: none;

        }

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>
<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a> 
                <a href="produtos.php">Produtos</a>
                <a href="fale.php">Fale conosco</a> 
                <a href="sobre.php">Sobre</a>
                <a href="../php/cadastro.php">Cadastre-se</a>
            </div>

            <div class="icones">
                <a href="perfiladm.php"><img src="../img/adm.png" alt=""></a>
                <a href="perfilfornecedor.php"><img src="../img/fornecedor.png" alt=""></a>
                <a href="perfil.php"><img src="../img/login.png" alt=""></a>
                <a href="carrinho.php" class="social"><img src="../img/carrinho.png" alt=""></a>
            </div>
        </nav>
    </header>

<main>
    <h1>Carrinho</h1>
    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carrinho as $id => $quantidade): ?>
                <?php
                $sql = "SELECT * FROM produto WHERE id = :id";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($produto):
                    $total_item = $produto['preco'] * $quantidade;
                    $total += $total_item; 
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($produto['modelo']); ?></td>
                        <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td>
                            <form action="atualizar_carrinho.php" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button id="botao" type="submit" name="acao" value="decrementar">-</button>
                            </form>
                            <?php echo $quantidade; ?>
                            <form action="atualizar_carrinho.php" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button id="botao" type="submit" name="acao" value="incrementar">+</button>
                            </form>
                        </td>
                        <td>R$ <?php echo number_format($total_item, 2, ',', '.'); ?></td>
                        <td>
                            <a href="remover_carrinho.php?id=<?php echo $id; ?>">Remover</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h2> 
    <div class="button-container">
        <a href="finalizar_compra.php" class="btn-finalizar">Finalizar Compra</a>
        <a href="produtos.php" class="btn-continuar">Continuar Comprando</a>
    </div>
</main>

</body>
</html>
