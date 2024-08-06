<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>

<header>
        <nav>
            <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt="" ></a>
            <div class="menu">
                <a href="index.php">Início</a>
                <a href="produtos.php">Produtos</a>
                <a href="fornecedores.php">Fornecedores</a>
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


    <h1 id="titulo">Fale conosco</h1>
    <p id="p">Deseja esclarecer dúvidas ou fazer orçamentos? <br> <span>Mande-nos uma mensagem!</span></p>

<div class="principal">

        <div class="formulario">
            <h2 id="msg" >Preencha os dados e escreva sua mensagem</h2>
            <form action="" method="">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">

                <label for="mensagem">Mensagem:</label>
                <input type="text" id="mensagem" name="mensagem">

                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>
    

</body>
</html>
