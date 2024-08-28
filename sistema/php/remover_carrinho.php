<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover produto do carrinho</title>
</head>
<body>

<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

 
    if (isset($_SESSION['carrinho'][$id])) {
        unset($_SESSION['carrinho'][$id]);
    }

    header('Location: carrinho.php');
    exit;
} else {
    echo "ID do produto não fornecido!";
    exit;
}
?>

    
</body>
</html>

