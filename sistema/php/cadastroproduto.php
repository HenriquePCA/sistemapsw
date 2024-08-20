<?php
$conn = new mysqli("localhost", "root", "", "cadastro");

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT nome FROM fornecedor";
$result = $conn->query($sql);


$fornecedores = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $fornecedores[] = $row['nome'];
    }
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modelo = $_POST['modelo'];
    // Outros campos...

    $mensagem = "O produto $modelo foi incluído com sucesso.";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">

    <style>
      
        .container {
            max-width: 800px;
            margin: 150px auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #ffff;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group.full-width {
            width: 100%;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .actions button {
            padding: 10px 30px;
            background-color: rgb(0, 51, 160);
            text-transform: uppercase;
            color: #F2F2F2;
            font-weight: bold;
            border: 2px solid rgb(0, 51, 160);
            transition: 0.3s;
            cursor: pointer;
        }

       .actions button:hover {
    background-color: transparent;
}
        .actions .cancel-btn {
            padding: 10px 30px;
            background-color: rgb(0, 51, 160);
            text-transform: uppercase;
            color: #F2F2F2;
            font-weight: bold;
            border: 2px solid rgb(0, 51, 160);
            transition: 0.3s;
            cursor: pointer;
        }
        .actions .submit-btn {
            padding: 10px 30px;
            background-color: rgb(0, 51, 160);
            text-transform: uppercase;
            color: #F2F2F2;
            font-weight: bold;
            border: 2px solid rgb(0, 51, 160);
            transition: 0.3s;
            cursor: pointer;
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
        
            </style>
   
    <title>Cadastro de Bicicleta</title>
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



    <div class="container">
    <h2>Cadastro de Bicicletas</h2>
    <form action="crudproduto.php" method="POST">
        <div class="form-group">

        
            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" required>
        </div>

        <div class="form-group">
            <label for="fornecedor">Fornecedor</label>
            <select id="fornecedor" name="fornecedor" required>
                <option value="" disabled selected>Selecione um fornecedor</option>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?php echo $fornecedor; ?>"><?php echo $fornecedor; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ano">Ano</label>
            <input type="number" id="ano" name="ano" required>
        </div>
        <div class="form-group">
            <label for="cor">Cor</label>
            <input type="text" id="cor" name="cor" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo de Bicicleta</label>
            <select id="tipo" name="tipo" required>
                <option value="" disabled selected>Selecione</option>
                <option value="montanha">Montanha</option>
                <option value="estrada">Estrada</option>
                <option value="urbana">Urbana</option>
                <option value="infantil">Infantil</option>
                <option value="eletrica">Elétrica</option>
            </select>
        </div>
 
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" id="preco" name="preco" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem do Produto</label>
            <input type="file" id="imagem" name="imagem" accept="image/*" required>
        </div>

        <div class="actions">
            <button type="reset" class="cancel-btn">Cancelar</button>
            <button type="submit" class="submit-btn">Cadastrar</button>
        </div>
    </form>
</div>
</body>
</html>