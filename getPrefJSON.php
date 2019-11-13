<?php
  require_once("Database/connect.php");
  require_once("Database/preferences-database.php");

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
