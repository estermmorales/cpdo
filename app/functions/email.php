<?php

function send(array $data) {
    $email = new PHPMailer\PHPMailer\PHPMailer;
    $email->CharSet = 'UTF-8';
    $email->SMTPSecure = 'plain';
    $email->isSMTP();
    $email->Host = 'smtp.mailtrap.io';
    $email->Port = 465;
    $email->SMTPAuth = true;
    $email->Username = '8dd725d9c15fb6';
    $email->Password = '179445ad5bd92a';
    $email->isHTML(true);
    $email->setFrom('estermorales.business@gmail.com');
    $email->FromName = $data['quem'];
    $email->addAddress($data['para']);
    $email->Body = $data['mensagem'];
    $email->Subject = $data['assunto'];
    $email->AltBody = 'Ver email';
    $email->msgHTML($data['mensagem']);
    return $email->send();
}
