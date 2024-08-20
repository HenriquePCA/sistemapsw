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
    <title>Venda de Carros e Motos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>

.carrossel {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
}



.carrossel-content {
    overflow-x: hidden;
    display: flex;
    gap: 20px; /* Espaçamento entre os itens */
}

.produtos {
    display: flex;
    gap: 20px; /* Espaçamento entre os produtos */
}

.produto {
    background-color: #121212;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    flex: 0 0 250px; /* Largura fixa de cada produto */
    text-align: center;
    color: #F2F2F2;
}

.produto img {
    max-width: 100%;
    height: auto;
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


     
.dropdown {
    position: relative;
}

.carrossel {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
    position: relative; 
}

/* Setas ajustadas */
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
    left: -40px; /* Ajusta para a esquerda fora do contêiner */
}

.seta-direita {
    right: -40px; /* Ajusta para a direita fora do contêiner */
}

.arrow:hover {
    color: rgb(0, 51, 160);
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

    </style>
</head>
<body>
<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a>
                <div class="dropdown">
                <a href="produtos.php">Produtos</a>
                <div class="dropdown-content">
                     <a href="cadastroproduto.php">Cadastro</a>
                     <a href="listaproduto.php">Lista</a>
                  </div>
                  </div>
                <div class="dropdown">
                  <a href="fornecedores.php">Fornecedores</a>
                    <div class="dropdown-content">
                     <a href="fornecedores.php">Cadastro</a>
                     <a href="listafornecedor.php">Lista</a>
                  </div>
                  </div>
                  <div class="dropdown">
                <a href="listamarcas.php">Marcas</a>
                <div class="dropdown-content">
                     <a href="cadastromarca.php">Cadastro</a>
                     <a href="listamarcas.php">Lista</a>
                  </div>
                  </div>
                <a href="sobre.php">Sobre</a>
                <a href="../php/cadastro.php">Cadastre-se</a>
            </div>

            <div class="icones">
                <a href="#"><i class="fab fa-facebook-f" style="color: #F2F2F2;"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in" style="color: #F2F2F2;"></i></a>
            </div>
        </nav>
    </header>


    <div class="divprincipal">
        <div class="carrossel">
            <button class="arrow seta-esquerda">&#9664;</button>
            <div class="carrossel-content">
            <div class="produtos">
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['modelo']; ?>">
                <h2><?php echo htmlspecialchars($produto['modelo']); ?></h2>
                <p><?php echo htmlspecialchars($produto['marca']); ?></p>
                <p>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                <a href="detalheproduto.php?id=<?php echo $produto['id']; ?>">Ver mais</a>
            </div>
        <?php endforeach; ?>
    </div>
                
            </div>
            <button class="arrow seta-direita">&#9654;</button>
        </div>



        
    <script src="../javascript/scripts.js"></script>
</body>
</html>
