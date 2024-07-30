<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>

    <style>
        .sobre{
            color: #f2f2f2;
            margin-top: 120px;
            padding: 20px;
            text-align: justify;
        }

        h1{
            text-align: center;
            margin-bottom: 20px;

        }

        #texto{
            margin-left: 40px;
            margin-right: 40px;
        }

        p{
            margin-bottom: 30px;
        }


    </style>


</head>
<body>

<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a>
                <a href="marcas.php">Marcas</a>
                <a href="ofertas.php">Ofertas</a>
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


    <div class="sobre">
        <h1>Sobre Nós</h1>

        <h2 id="texto" >História</h2>
        <p id="texto" >
            Nossa empresa foi fundada em [ano] com o objetivo de [objetivo da empresa]. Desde então, temos crescido e evoluído para nos tornar [descrição do crescimento e evolução da empresa].
        </p>

        <h2 id="texto">Missão</h2>
        <p id="texto" >
            Nossa missão é [descrever a missão da empresa]. Estamos comprometidos em [detalhes do compromisso da empresa].
        </p>

        <h2 id="texto">Valores</h2>
        <p id="texto">
            Nossos valores incluem [lista de valores da empresa]. Acreditamos que [detalhes sobre como os valores impactam a empresa e seus clientes].
        </p>
    </div>
</body>
</html>