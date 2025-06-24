<?php

include("conectar.php");

$nome = $_POST["Nome"];
$email = $_POST["Email"];
$data = $_POST["Data"];
$horario = $_POST["Horario"];
$servico = $_POST["Serviço"];
$tipodeservico = $_POST["Tipodeserviço"];

$sql = "INSERT INTO marcacoes (~cliente, ~email, ~data, ~hora, ~serviço, ~tipo) 
        VALUES ('$nome', '$email', '$data', '$horario', '$servico', '$tipodeservico')";

if (mysqli_query($conexao, $sql)) {
    echo "Marcação realizada com sucesso!";
} else {
    echo "Erro ao realizar a marcação: " . mysqli_error($conexao);
}

$conexao->close();

?>