<?php
require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obter os detalhes do produto
    $sql = "SELECT * FROM produto WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        // Produto encontrado, exibir detalhes
        $modelo = htmlspecialchars($produto['modelo']);
        $marca = htmlspecialchars($produto['marca']);
        $ano = htmlspecialchars($produto['ano']);
        $cor = htmlspecialchars($produto['cor']);
        $tipo = htmlspecialchars($produto['tipo']);
        $preco = number_format($produto['preco'], 2, ',', '.');
        $imagem = htmlspecialchars($produto['imagem']);
    } else {
        echo "Produto não encontrado!";
        exit;
    }
} else {
    echo "ID do produto não fornecido!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Detalhes do Produto</title>
    <style>

main {
    margin: auto;
    margin-top: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 90%;
    max-width: 1200px;
}

.produto-detalhes {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #121212;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 1200px;
    color: #F2F2F2;
}


.produto-imagem {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.produto-imagem img {
    max-width: 100%;
    max-height: 400px;
    border-radius: 8px;
}

.produto-info {
    flex: 2;
    padding: 20px;
    color: #F2F2F2;
}

.produto-info h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.produto-info p {
    font-size: 1.2em;
    margin-bottom: 10px;
}


.botoes {
    display: flex;
    justify-content: flex-start; /* Alinha os botões à esquerda */
    gap: 20px; /* Espaçamento entre os botões */
    margin-top: 20px;
}

.btn-adicionar-carrinho, .btn-voltar {
    background-color: rgb(0, 51, 160);
    color: white;
    border: none;
    padding: 15px 20px;
    text-align: center;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    width: auto; /* Remove o width 100% */
    transition: 0.3s;
    text-decoration: none;
    display: inline-block;
}

.btn-adicionar-carrinho:hover, .btn-voltar:hover {
    background-color: transparent;
    border: 2px solid rgb(0, 51, 160);
    color: rgb(0, 51, 160);
}
    </style>

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
                <a href="perfil.php"><img src="../img/login.png" alt=""></a>
                <a href="carrinho.php" class="social"><img src="../img/carrinho.png" alt=""></a>
            </div>
        </nav>
    </header>
    <main>
        <div class="produto-detalhes">
            <div class="produto-imagem">
                <img src="<?php echo $imagem; ?>" alt="<?php echo $modelo; ?>" onerror="this.onerror=null; this.src='path-to-default-image.png'">
            </div>
            <div class="produto-info">
                <h1><?php echo $modelo; ?></h1>
                <p><strong>Marca:</strong> <?php echo $marca; ?></p>
                <p><strong>Ano:</strong> <?php echo $ano; ?></p>
                <p><strong>Cor:</strong> <?php echo $cor; ?></p>
                <p><strong>Tipo:</strong> <?php echo $tipo; ?></p>
                <p><strong>Preço:</strong> R$ <?php echo $preco; ?></p>
                
                

                <form method="POST" action="adicionar_carrinho.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit" class="btn-adicionar-carrinho">Adicionar ao Carrinho</button>
    <a href="produtos.php" class="btn-voltar">Voltar</a>
</form>

            </div>
        </div>
    </main>
</body>
</html>
