<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DBNAME', 'cadastro');


try{
    $conexao=new pdo('mysql:host='.HOST.';dbname='. DBNAME, USUARIO,SENHA);
}catch(PODException $e){
    echo "Erro: Conexão com barra de dados nao 
    foi realizada com sucesso. Erro gerado" . $e->getMessage();
}

$mysqli = new mysqli("localhost", "root", "", "cadastro");

if ($mysqli->connect_error) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

?>