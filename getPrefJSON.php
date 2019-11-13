<?php
  require_once("Database/connect.php");
  require_once("Database/preferences-database.php");
  header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

if(!isset($_GET["userId"])){
  $size = readfile("defaultPreferences.json");
}
else{
  $pref = getPreferencesById($connection, $_GET["userId"]);

  if(isset($pref)){
    echo $pref;
  }
  else{
    echo mysqli_error($connection);
  }
}
