<?php

include("conectar.php");

$sql = "SELECT Dia, Hora FROM marcacoes ORDER BY Dia";
$resultado = $conexao->query($sql);

$DiasMarcados = [];
if ($resultado->num_rows > 0) { 
    while ($linha = $resultado->fetch_assoc()) {
        $DiasMarcados[] = $linha;
    }
}
echo json_encode($DiasMarcados);


$conexao->close();

?>