<?php
require_once("Models/Issue.php");

function insertPreferences($connection, $userId, $prefJSON) {
    $query = "insert into preferences (userId, preferencesJSON) values ({$userId}, '{$prefJSON}')";
    return mysqli_query($connection, $query);
}

function alterPreferences($connection, $userId, $prefJSON) {
    $query = "update preferences set preferencesJSON = '{$prefJSON}' where userId = {$userId}";
    return mysqli_query($connection, $query);
}

function removePreferences($connection, $userId) {
    $query = "delete from preferences where id = {$userId}";
    return mysqli_query($connection, $query);
}

function getPreferencesById($connection, $userId) {
    $query = "select * from preferences where userId = {$userId}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    return $arr["preferencesJSON"];
}
