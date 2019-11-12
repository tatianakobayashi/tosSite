<?php
  require_once("Database/connect.php");
  require_once("Database/preferences-database.php");

if(!isset($_POST["userId"])){
  $size = readfile("defaultPreferences.json");
}
else{
  $pref = getPreferencesById($connection, $_POST["userId"]);

  if(isset($pref)){
    echo $pref;
  }
  else{
    echo mysqli_error($connection);
  }
}
