<?php

require "../../../bootstrap.php";

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if (isEmpty()) {
    flash('message', "Please, fill in all fields!");

    return redirect("edit_user&id=$id");
}

$validate = validate([
    'name' => 's',
    'lastname' => 's',
    'email' => 'e'
]);

$updated = update('users', $validate, ['id', $id]);

if ($updated) {
    flash('message', 'Successfully updated!', 'success');
    return redirecToHome();
}
flash('message', 'Something went wrong! Update failed');
return redirect("edit_user&id=$id");
