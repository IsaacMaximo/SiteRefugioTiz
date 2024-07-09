<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta e limpa os dados do formulário
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Configurações do e-mail
    $to = "isaac3p4@gmail.com"; // Substitua pelo seu e-mail
    $subject = "Formulário de Contato";
    
    // Corpo do e-mail
    $body = "Nome: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Mensagem:\n$message\n";

    // Cabeçalhos do e-mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($to, $subject, $body, $headers)) {
        echo "Obrigado pelo seu contato. Sua mensagem foi enviada.";
    } else {
        echo "Houve um erro ao enviar sua mensagem. Por favor, tente novamente.";
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
