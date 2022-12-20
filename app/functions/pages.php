<?php

/**
 * @throws Exception
 */
function load() {
    $page = isset($_GET['page'])? strip_tags($_GET['page']) : '';

    $page = (!$page) ? 'pages/home.php' : "pages/$page.php";

    if (!file_exists($page)) {
        throw new Exception('Something went wrong!');
    }

    return $page;
}
