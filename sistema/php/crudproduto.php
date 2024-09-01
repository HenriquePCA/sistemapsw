<?php
require_once("conexao.php");

$modelo= $_POST['modelo'];
$marca= $_POST['marca'];
$ano= $_POST['ano'];
$cor= $_POST['cor'];
$tipo= $_POST['tipo'];
$preco= $_POST['preco'];
$imagem= $_POST['imagem'];

$sql = "INSERT INTO produto (modelo, marca, ano, cor, tipo, preco, imagem) VALUES (:modelo, :marca, :ano, :cor, :tipo, :preco, :imagem)";
$sqlcombanco = $conexao->prepare($sql);

$sqlcombanco->bindParam(':modelo', $modelo);
$sqlcombanco->bindParam(':marca', $marca);
$sqlcombanco->bindParam(':ano', $ano);
$sqlcombanco->bindParam(':cor', $cor);
$sqlcombanco->bindParam(':tipo', $tipo);
$sqlcombanco->bindParam(':preco', $preco);
$sqlcombanco->bindParam(':imagem', $imagem);

if ($sqlcombanco->execute()) {
    echo "<div class='success-message'>";
    echo "<h3>Ok, o modelo $modelo foi incluído com sucesso!</h3>";
    echo "<a href='listaproduto.php' class='success-button'>Visualizar lista de produtos</a>";
    echo "</div>";
} else {
    echo "<h3>O modelo não foi inserido.</h3>";
}
?>
