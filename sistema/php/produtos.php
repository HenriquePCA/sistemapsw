<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Venda de Carros e Motos</title>
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

    </style>
</head>
<body>
<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a>
                <a href="produtos.php">Produtos</a>
                <div class="dropdown">
                  <a href="fornecedores.php">Fornecedores</a>
                    <div class="dropdown-content">
                     <a href="pagina1.php">Página 1</a>
                     <a href="pagina2.php">Página 2</a>
                     <a href="pagina3.php">Página 3</a>
                  </div>
                  </div>
                <a href="fale.php">Fale conosco</a>
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
        <h1 id="txt">Fornecedor: Caloi</h1>
        <div class="carrossel">
            <button class="arrow seta-esquerda">&#9664;</button>
            <div class="carrossel-content">
                <div class="carro">
                    <img src="../img/bike1.png" alt="Bike 1">
                    <h2>ATACAMA F</h2>
                    <p>Moutain Bike <br> 6 cores disponíveis </p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/bike2.png" alt="Bike 2">
                    <h2>BLACKBURN</h2>
                    <p>Moutain Bike <br> 2 cores disponíveis</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/bike3.png" alt="Bike 3">
                    <h2>Caloi 400 M</h2>
                    <p>Urbana <br> 1 cor disponível</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/bike4.png" alt="Bike 4">
                    <h2>ELITE</h2>
                    <p>Moutain Bike <br> 10 cores disponíveis</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/bike5.png" alt="Carro 5">
                    <h2>ELITE CARBON RACING</h2>
                    <p>Moutain Bike <br> 2 cores disponíveis</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/bike6.png" alt="Carro 6">
                    <h2>STRADA RACING</h2>
                    <p>Estrada <br> 2 cores disponíveis</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/bike7.png" alt="Carro 7">
                    <h2>CALOI 10</h2>
                    <p>Estrada <br> 8 cores disponíveis</p>
                    <button>Ver mais</button>
                </div>
                
            </div>
            <button class="arrow seta-direita">&#9654;</button>
        </div>



        <h1 id="txt"> <br> <br>Motos</h1>
        <div class="carrossel">
            <button class="arrow seta-esquerda">&#9664;</button>
            <div class="carrossel-content">
                <div class="carro">
                    <img src="../img/moto1.jpg" alt="Moto 1">
                    <h2>Moto 1</h2>
                    <p>Descrição  1</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/moto2.jpg" alt="Moto 2">
                    <h2>Moto 2</h2>
                    <p>Descrição  2</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/moto3.jpg" alt="Moto 3">
                    <h2>Moto 3</h2>
                    <p>Descrição  3</p>
                    <button>Ver mais</button>
                </div>
                <div class="carro">
                    <img src="../img/moto4.jpg" alt="Moto 4">
                    <h2>Moto 4</h2>
                    <p>Descrição  4</p>
                    <button>Ver mais</button>
                </div>
            </div>
            <button class="arrow seta-direita">&#9654;</button>
        </div>

    </div>

    <script src="../javascript/scripts.js"></script>
</body>
</html>
