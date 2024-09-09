<?php

session_start();

if (!isset($_SESSION['adm_id'])) {
    
    header("Location: loginadm.php");
    exit;
}

$admin_id = $_SESSION['adm_id']; 

require_once("conexao.php");


$sql = "SELECT nome, email, cpf, acesso, telefone, data_nascimento, foto FROM adm WHERE id = :id";
$sqlcombanco = $conexao->prepare($sql);
$sqlcombanco->bindParam(':id', $admin_id, PDO::PARAM_INT);
$sqlcombanco->execute();

$admin = $sqlcombanco->fetch(PDO::FETCH_ASSOC);

if ($admin) {
  
    $nome = $admin['nome'];
    $email = $admin['email'];
    $cpf = $admin['cpf'];
    $acesso = $admin['acesso'];
    $telefone = $admin['telefone'];
    $data_nascimento = $admin['data_nascimento'];
    $foto = $admin['foto']; 
} else {
   
    echo "Administrador não encontrado.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Perfil Administrador</title>
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
        
           

        main {
            margin-top: 130px;
            display: flex;
            padding: 20px;
            color: white;
        }

        .admin-info {
            width: 30%;
            
            background-color:  rgb(0, 51, 160);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .admin-info img {
            border-radius: 50%;
            width: 150px;
            margin-bottom: 20px;
        }

        .admin-info h2 {
            margin-bottom: 10px;
        }

        .admin-info p {
            margin: 5px 0;
        }

        .admin-options {
            width: 70%;
            margin-left: 20px;
        }

        .option {
            background-color: #333;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .option button {
            padding: 10px 20px;
            background-color: #0033a0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .option button:hover {
            background-color: transparent;
            border: 2px solid #0033a0;
        }

        #botao {
            margin-top: 30px;
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
                <a href="perfiladm.php"><img src="../img/adm.png" alt=""></a>
                <a href="perfilfornecedor.php"><img src="../img/fornecedor.png" alt=""></a>
                <a href="perfil.php"><img src="../img/login.png" alt=""></a>
                <a href="carrinho.php" class="social"><img src="../img/carrinho.png" alt=""></a>
            </div>
        </nav>
    </header>
    
    <main>
    <div class="admin-info">
        <img src="<?php echo $foto; ?>" alt="Foto do Administrador">
        <h2><?php echo $nome; ?></h2>
        <p>Email: <?php echo $email; ?></p>
        <p>CPF: <?php echo $cpf; ?></p>
        <p>Acesso: <?php echo $acesso; ?></p>
        <p>Telefone: <?php echo $telefone; ?></p>
        <p>Data de Nascimento: <?php echo $data_nascimento; ?></p>
        <a href="logoutadm.php"><button id="botao" >SAIR</button></a>
    </div>

    <div class="admin-options">
        <div class="option">
            <p>Gerenciar Fornecedores</p>
            <a href="listafornecedor.php"><button>ACESSAR</button></a>
        </div>
        <div class="option">
            <p>Gerenciar Marcas</p>
            <a href="listamarcas.php"><button>ACESSAR</button></a>
        </div>
        <div class="option">
            <p>Gerenciar Produtos</p>
            <a href="listaproduto.php"><button>ACESSAR</button></a>
        </div>

        <div class="option">
            <p>Gerenciar Usuários</p>
            <a href="listausuarios.php"><button>ACESSAR</button></a>
        </div>

        <div class="option">
            <p>Visualizar Compras</p>
            <a href="listacompra.php"><button>ACESSAR</button></a>
        </div>
    </div>
</main>

</body>
</html>