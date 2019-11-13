<?php
include_once('Database/connect.php');
include_once('Database/preferences-database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

if(getPreferencesById($connection, $_POST["userId"])!== null){
  insertPreferences($connection, $_POST["userId"], $_POST["userPreferences"])
}else{
  alterPreferences($connection, $_POST["userId"], $_POST["userPreferences"])
}
