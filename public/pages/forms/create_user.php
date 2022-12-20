<?php

require "../../../bootstrap.php";

if (isEmpty()) {
    flash('message', "Please, fill in all fields!");

    return redirect("create_user");
}

$validate = validate([
    'name' => 's',
    'lastname' => 's',
    'email' => 'e',
    'password' => 's',
]);

$signIn = create('users', $validate);

if ($signIn) {
    flash('message', 'Registration successfully completed!', 'success');
    return redirect('create_user');
}
flash('message', 'Something went wrong! Registration failed');
return redirect('create_user');