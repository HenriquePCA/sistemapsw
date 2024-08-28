<?php
require_once('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['estatus'];

    // Atualizar o status no banco de dados
    $query = "UPDATE marca SET estatus = :estatus WHERE id = :id";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(':estatus', $status);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Verifica se a atualização ocorreu
    if ($stmt->rowCount() > 0) {
        // Status atualizado com sucesso, redireciona de volta para a lista
        header('Location: listamarcas.php');
        exit();
    } else {
        // Nenhuma mudança detectada ou erro ao atualizar (exibir uma mensagem ou redirecionar)
        echo "Erro ao atualizar o status. Tente novamente.";
    }
}
?>
