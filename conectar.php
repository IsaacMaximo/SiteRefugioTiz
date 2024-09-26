<?php
    $hostname = `localhost`;
    $bancodedados = "basededadosreftiz";
    $usuario = "root";
    $senha = "";

    $conexao = mysqli_connect($hostname, $usuario, $senha, $bancodedados);
    if (!$conexao) {
        die( "falha ao fazer ligação: " .mysqli_connect_error());
    }
?>
