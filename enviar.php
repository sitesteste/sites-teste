<?php

require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.phpmailer.php';

// Criação da instância
$mailer = new PHPMailer;

// Pegando os campos do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$arquivo = $_FILES["arquivo"];
$mensagem = $_POST['mensagem'];

// Configuração SMTP
$mailer->isSMTP();
$mailer->SMTPAuth = true;
$mailer->Host = 'smtp-mail.outlook.com';
$mailer->Port = 587;
$mailer->Username = 'testeenviosmtp2024@outlook.com';
$mailer->Password = 'acesso1020';
$mailer->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

// Configuração remetente
$mailer->From = 'testeenviosmtp2024@outlook.com';
$mailer->FromName = 'Nome Completo';
$mailer->Subject = 'Assunto da Mensagem';

// Configuração destinatários
$mailer->addAddress('testeenviosmtp2024@outlook.com');
$mailer->addAddress('testeenviosmtp2024@outlook.com');
$mailer->addCC('testeenviosmtp2024@outlook.com');

// Anexos
$mailer->AddAttachment($arquivo['tmp_name'], $arquivo['name']);

// Corpo da mensagem
$mailer->CharSet = 'UTF-8';
$mailer->isHTML(true);

// Corpo da mensagem sem template HTML externo
// $corpoMSG = "<strong>Nome:</strong> $nome<br>
// <strong>Telefone:</strong> $telefone<br>
// <strong>E-mail:</strong> $email<br>
// <strong>Anexo:</strong> {$arquivo['name']}<br>
// <strong>Mensagem:</strong> $mensagem<br>";

// Corpo da mensagem com template HTML externo
$corpoMSG = file_get_contents(dirname(__FILE__) . '/email-templates/template1.html');
$corpoMSG = str_replace('{template_nome}', $nome, $corpoMSG);
$corpoMSG = str_replace('{template_telefone}', $telefone, $corpoMSG);
$corpoMSG = str_replace('{template_email}', $email, $corpoMSG);
$corpoMSG = str_replace('{template_arquivo}', $arquivo['name'], $corpoMSG);
$corpoMSG = str_replace('{template_mensagem}', $mensagem, $corpoMSG);

$mailer->MsgHTML($corpoMSG);

//$mailer->SMTPDebug = 2; // Habilitar log de erros

if (!$mailer->Send()) {
    echo "Erro ao enviar: " . $mailer->ErrorInfo;
} else {
    header('Location: obrigado.html'); // Redirecionamento p/ página obrigado
    exit;
}
