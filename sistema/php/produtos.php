<?php
require_once('conexao.php');

$sql = "SELECT * FROM produto";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Venda de Bicicletas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
          .dropdown {
            position: relative;
        }
        
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
        
        .dropdown-content a:hover {
            background-color: transparent;
            
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }

.carrossel {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
}

.carrossel-content {
    overflow-x: hidden;
    display: flex;
    flex-wrap: wrap; 
    gap: 20px;
    justify-content: center; 
}

.produto {
    background-color: #121212;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    flex: 0 0 23%;
    max-width: 23%; 
    text-align: center;
    color: #F2F2F2;
}

.produto img {
    width: 100%;
    height: 200px; 
    object-fit: cover; 
    border-radius: 8px;
    margin-bottom: 10px;
}

.produto h2 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.produto p {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.produto a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: rgb(0, 51, 160);
    color: white;
    text-decoration: none;
    border-radius: 4px;
    transition: 0.3s;
}

.produto a:hover {
    background-color: transparent;
    border: 2px solid rgb(0, 51, 160);
    color: rgb(0, 51, 160);
}

.arrow {
    background-color: transparent;
    border: none;
    color: #F2F2F2;
    font-size: 2em;
    cursor: pointer;
    transition: 0.3s;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}

.seta-esquerda {
    left: -40px; 
}

.seta-direita {
    right: -40px; 
}

.arrow:hover {
    color: rgb(0, 51, 160);
}
.icones img {
            width: 40px;
            padding-right: 10px;
        }
        
    </style>
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
  
<div class="divprincipal">
    <div class="carrossel">
        <button class="arrow seta-esquerda">&#9664;</button>
        <div class="carrossel-content">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto">
                    <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" alt="<?php echo htmlspecialchars($produto['modelo']); ?>">
                    <h2><?php echo htmlspecialchars($produto['modelo']); ?></h2>
                    <p><?php echo htmlspecialchars($produto['marca']); ?></p>
                    <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                    <a href="detalheproduto.php?id=<?php echo $produto['id']; ?>">Ver mais</a>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="arrow seta-direita">&#9654;</button>
    </div>
</div>

<script src="../javascript/scripts.js"></script>
</body>
</html>
