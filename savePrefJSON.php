<?php
include_once('Database/connect.php');
include_once('Database/preferences-database.php');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

if(getPreferencesById($connection, $_GET["userId"])!== null){
  insertPreferences($connection, $_GET["userId"], $_GET["userPreferences"])
}else{
  alterPreferences($connection, $_GET["userId"], $_GET["userPreferences"])
}
