<?php
$nome = $_POST['Nome'] ?? 'Não informado';
$email = $_POST['Email'] ?? 'Não informado';
$data = $_POST['Data'] ?? 'Não informado';
$hora = $_POST['Horario'] ?? 'Não informado';
$servico = $_POST['Serviço'] ?? 'Não informado';
$tipo = $_POST['Tipodeserviço'] ?? 'Não informado';

$para = "isaac3p4@gmail.com"; // Trocar pelo e-mail real que vai receber
$assunto = "Nova marcação de horário";

$mensagem = "📝 Nova marcação recebida:\n\n";
$mensagem .= "Nome: $nome\n";
$mensagem .= "E-mail: $email\n";
$mensagem .= "Data: $data\n";
$mensagem .= "Hora: $hora\n";
$mensagem .= "Serviço: $servico\n";
$mensagem .= "Tipo de Serviço: $tipo\n";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($para, $assunto, $mensagem, $headers)) {
    echo "✅ Marcação enviada com sucesso!";
} else {
    echo "❌ Ocorreu um erro ao enviar sua marcação. Tente novamente.";
}
?>
