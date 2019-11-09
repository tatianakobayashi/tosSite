<?php
require_once('Models/User.php');

function getUser($connection, $user) {
    $password = md5($user->getPassword());
    $email = mysqli_real_escape_string($connection, $user->getEmail());

    $query = "select * from usuarios where email='{$email}' and senha='{$password}'";
    
    $resultado = mysqli_query($connection, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

public function insertUser($user)
{
    # code...
}