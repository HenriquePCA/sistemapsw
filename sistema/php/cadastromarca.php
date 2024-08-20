<?php
$conn = new mysqli("localhost", "root", "", "cadastro");

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $website = $_POST['website'];
    $estatus = $_POST['estatus'];

    $sql = "INSERT INTO marca (nome, website, estatus) VALUES ('$nome', '$website', '$estatus')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "A marca $nome foi incluída com sucesso.";
    } else {
        $mensagem = "Erro: " . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
</head>
    </style>
    <title>Cadastro de Marca</title>
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

<h1 id="titulo">Cadastre uma Marca</h1>

<div class="principal">
    <div class="formulario">
        <h2>Dados da Marca</h2>
        <form action="crudmarca.php" method="post">
            <label for="nome">Nome da Marca:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="website">Website:</label>
            <input type="text" id="website" name="website" required>

            <label for="estatus">Status:</label>
            <select id="estatus" name="estatus">
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>

            <button type="submit">Cadastrar</button>
        </form>
        <?php if (!empty($mensagem)) { echo "<p>$mensagem</p>"; } ?>
    </div>
</div>

</body>
</html>
