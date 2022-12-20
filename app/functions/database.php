<?php

function connect(): PDO
{
    $pdo = new \PDO("mysql:host=localhost;dbname=contact", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

function create($table, $fields): bool
{
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
function update($table, $fields, $where) {
    $pdo = connect();
    if(!is_array($fields)) {
        $fields = (array) $fields;
    }
    $data = array_map(function ($field) {
        return "$field = :$field";
    }, array_keys($fields));

    $sql = "update $table set ";
    $sql .= implode(',', $data);
    $sql.=" where $where[0] = :$where[0]";
    $data = array_merge($fields, [$where[0] => $where[1]]);

    $update = $pdo->prepare($sql);
    $update->execute($data);

    return $update->rowCount();

}

function find($table, $field, $value) {
    $pdo = connect();
    $value = filter_var($value, FILTER_VALIDATE_INT);
    $sql = "select * from $table where $field = :$field";
    $find = $pdo->prepare($sql);
    $find->bindValue($field, $value);
    $find->execute();

    return $find->fetch();
}

function findAll($table) {
    $pdo = connect();
    $sql = "select * from $table";
    $list = $pdo->query($sql);

    $list->execute();

    return $list->fetchAll();
}

function delete($table, $field, $value) {
    $pdo = connect();
    $sql = "delete from $table where $field = :$field";
    $delete = $pdo->prepare($sql);
    $delete->bindValue($field, $value);
    return $delete->execute();
}