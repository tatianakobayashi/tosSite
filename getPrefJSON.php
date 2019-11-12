<?php
  require_once("Database/connect.php");
  require_once("Database/preferences-database.php");

  $pref = getPreferencesById($connection, $_POST["userId"]);

  if(isset($pref)){
    echo $pref;
  }
  else{
    echo mysqli_error($connection);
  }
