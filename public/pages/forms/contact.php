<?php

require "../../../bootstrap.php";

if (isEmpty()) {
    flash('message', "Please, fill in all fields!");

    return redirect("contact");
}

$validate = validate([
    'name' => 's',
    'email' => 'e',
    'message' => 's',
    'subject' => 's'
]);

$data = [
    'quem' => $validate->email,
    'para' => 'estermorales.business@gmail.com',
    'mensagem' => $validate->message,
    'assunto' => $validate->subject
];

if(send($data)) {
    flash('message', 'Email send', 'success');
    return redirect("contact");
}