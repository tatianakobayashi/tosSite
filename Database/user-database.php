<?php
require_once('Models/User.php');

function getUser($connection, $user) {
    $password = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($connection, $user->getEmail());

    $query = "select * from users where email='{$email}' and password='{$password}'";
    
    $resultado = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($resultado);

    $user = null;
    $user = new User($arr["name"], $arr["email"], $arr["experience"], $arr["quote"], $arr["edits"]);
    $user->setId($arr["id"]);
    return $user;
}

public function insertUser($connection, $name, $email, $experience, $password1, $password2)
{
    if($password1 != $password2) return false;

    $password = password_hash($password1, PASSWORD_DEFAULT);

    $query = "insert into users (name, email, experience, password) values ('{$name}', '{$email}', '{$experience}', '{$password}')";
    return mysqli_query($connection, $query);
}

function alterUser($connection, $id, $name, $email, $oldPassword, $password1, $password2) {
    
    $user = getUserById($connection, $id);

    if(!password_verify ($oldPassword, $user->getPassword())) return false;
    if($password1 != $password2) return false;

    $password = password_hash($password1, PASSWORD_DEFAULT);

    $query = "update users set name = '{$name}', email = '{$email}', experience = '{$experience}', password = '{$password1}' where id = {$id}";
    return mysqli_query($connection, $query);
}

function removeUser($connection, $id) {
    $query = "delete from users where id = {$id}";
    return mysqli_query($connection, $query);
}

function getUserById($connection, $id) {
    $query = "select * from users where id = {$id}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    $password = 
    $user = new User($arr["name"], $arr["email"], $arr["experience"], $arr["quote"], $arr["edits"]);
    $user->setId($arr["id"]);
    return $user;
}