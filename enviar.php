<?php
include ("vendor/autoload.php");
include ("include/configbasica.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

    $nome = htmlspecialchars($_POST['Nome']);
    $email = htmlspecialchars($_POST['Email']);
    $data = htmlspecialchars($_POST['Data']);
    $horario = htmlspecialchars($_POST['Horario']);
try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->Port       = SMTP_PORT;

    //Recipients
    $mail->setFrom('Isaac3p4@gmail.com', 'Isaac');
    $mail->addAddress('Isaac3p4@gmail.com', 'Isaac');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Marcacao Refugio Terapeutico da Tiz';
    $mail->Body    = "Nome do cliente: $nome<br>Email do cliente: $email<br>Data de marcacao do cliente: $data<br>Horario marcado pelo cliente: $horario";

    $mail->send();
    echo 'E-mail enviado';
} catch (Exception $e) {
    echo "Erro: {$mail->ErrorInfo}";
}


    
    
    $to = "isaac3p4@gmail.com";
    $subject = "Nova marcação de Horário";
    $body = "Nome do cliente: $nome\nEmail do cliente: $email\nData de marcação do cliente: $data\nHorário marcado pelo cliente: $horario\n";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

?>
