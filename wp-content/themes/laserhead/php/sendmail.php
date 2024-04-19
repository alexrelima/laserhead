<?php
session_start();

$nome = $_POST["name"];
$email = $_POST["email"];
$telefone = $_POST["phone"];
$celular = $_POST["cell-phone"];
$mensagem = $_POST["mensagem"];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer.php';
require_once 'SMTP.php';
require_once 'Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;  
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'admin@imaginy.com.br';                     //SMTP username
    $mail->Password   = 'smtp@2024Acesso';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('admin@imaginy.com.br', $nome);
    $mail->addAddress('contato@imaginy.com.br', 'Agência Imaginy');     //Add a recipient
    $mail->addReplyTo($email, $nome);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = "Quero receber um contato";
    $mail->Body = (
        "<html>
            Nome: {$nome}<br/>
            E-mail: {$email}<br/>
            Telefone: {$telefone}<br/>
            Celular: {$celular}<br/>
            Mensagem: {$mensagem}
        </html>"
    );
    $mail->AltBody = "Nome: {$nome}\nE-mail: {$email}\nTelefone: {$telefone}\nCelular: {$celular}\nMensagem:{$mensagem}";

    if ($mail->send()) {
        $_SESSION["success"] = "Mensagem enviada com sucesso";
        header("Location: https://imaginy.com.br/obrigado/");
    } else {
        $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
        header("Location: https://imaginy.com.br/erro/");
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
die();