<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../javascript/script.js"></script>''
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

    <title>Início</title>
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
    
    <div class="inicio">
        <div class="main">
            <h3>LUXO BIKE</h3>
            <h1>GARANTA SUA BICICLETA <br> <span> AGORA</span> </h1>
            <p>COM A MELHOR QUALIDADE </p>
            <a href="produtos.php" class="botao">Ver Bicicletas</a>
        </div>

        <div class="carousel-container">
        <div class="carousel">
            <img src="../img/image1.png" alt="Imagem 1">
            <img src="../img/image2.png" alt="Imagem 2">
            <img src="../img/image3.png" alt="Imagem 3">
        </div>
    </div>
    </div>

    <footer>
    <div class="contatos">
            <h4>Contatos</h4>
            <p>Telefone: (77) 1234-5678</p>
            <p>Email: luxobike@gmail.com</p>
        </div>
        <div class="links">
            <h4>Links</h4>
            <ul>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Ofertas</a></li>
                <li><a href="#">Fale conosco</a></li>
            </ul>
        </div>
        <div class="alunos">
            <h4>Progamadores:</h4>
            <p> Henrique Pimentel <br> Pedro Henrique Cardoso Dias <br> Felipe Lavigne</b></p>
        </div>
    </footer>







    
</body>
</html>