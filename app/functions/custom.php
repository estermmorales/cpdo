<?php



function dd($dump) {
    var_dump($dump);
    die();
}

function request(): array
{
    $request = $_SERVER['REQUEST_METHOD'];
    if ($request == 'POST') {
        return $_POST;
    }
    return $_GET;
}

function redirect(string $target)
{
    return header("location:/?page=$target");
}

function redirecToHome() {
    return header("location:/");
}