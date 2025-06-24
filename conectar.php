<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "nome_do_banco"; // troque pelo nome real do seu banco

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
