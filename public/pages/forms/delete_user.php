<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$deleted = delete('users', 'id', $id);

if ($deleted) {
    return redirecToHome();
}
flash('message', 'Something went wrong! Could not be deleted');
redirecToHome();