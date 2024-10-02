<?php
$to = "lucasferrazdias15@gmail.com"; // Endereço do destinatário
$subject = "Assunto do E-mail"; // Assunto do e-mail
$message = "Olá, este é um teste de envio de e-mail."; // Mensagem do e-mail
$headers = "From: lucasferrazdias15@gmail.com\r\n" . // Remetente
           "Reply-To: lucasferrazdias15@gmail.com\r\n" . // Responder para
           "X-Mailer: PHP/" . phpversion(); // Informações do servidor

// Enviando o e-mail
if(mail($to, $subject, $message, $headers)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Falha ao enviar o e-mail.";
}
?>
