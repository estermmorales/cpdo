<?php

function connect() {
    $pdo = new \PDO("mysql:host=localhost;dbname=blog;charset=utf8", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

function create($table, $fields) {
    $pdo = connect();
    if(!is_array($fields)) {
        $fields = (array) $fields;
    }
    $sql = "insert into $table";
    $sql.="(".implode(',', array_keys($fields)).")";
    $sql.="values (".":".implode(',:', array_keys($fields)).")";
    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);
}

function update() {

}

function find() {

}

function delete() {

}