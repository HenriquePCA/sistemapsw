<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style1.css">
    <title>Lista de Usuários</title>
    
</head>
<body>

<?php 
require_once('conexao.php');
$retorno = $conexao->prepare('SELECT * FROM usuario');
$retorno->execute();
?>     

<header>
    <nav>
        <a href="../php/index.php"><img src="../img/logo.png" id="logo" alt=""></a>
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

<h3>Lista de Usuários</h3>
<table> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data Nascimento</th>
            <th>Email</th>
            <th>Alterar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($retorno->fetchAll() as $value) { ?>
            <tr>
                <td><?php echo $value['id'] ?></td> 
                <td><?php echo $value['nome'] ?></td> 
                <td><?php echo $value['telefone'] ?></td> 
                <td><?php echo $value['nascimento'] ?></td> 
                <td><?php echo $value['email'] ?></td> 
                <td>
                    <form method="POST" action="altcadastro.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Alterar</button>
                    </form>
                </td> 
                <td>
                    <form method="POST" action="deleteUser.php">
                        <input name="id" type="hidden" value="<?php echo $value['id']; ?>"/>
                        <button class="button" type="submit">Excluir</button>
                    </form>
                </td> 
            </tr>
        <?php } ?> 
    </tbody>
</table>

<button class="button button3" style="display: block; margin: 20px auto;"><a href="index.php">Voltar</a></button>

</body>
</html>