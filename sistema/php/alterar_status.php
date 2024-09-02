<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['estatus'];

    $query = "UPDATE marca SET estatus = :estatus WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':estatus', $status);
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        header('Location: listamarcas.php');
        exit();
    } else {

        echo "Erro ao atualizar o status. Tente novamente.";
    }
}
?>
