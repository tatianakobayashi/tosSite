<?php
    require_once("Database/connect.php");
    require_once("Database/user-database.php");

    $user = getUser($connection, $_POST["email"], $_POST["password"]);

    if(isset($user)) {
        // $_SESSION["userId"] = $user->getId();
        // $_SESSION["userName"] = $user->getName();
      echo '{"userId":'.$user->getId().',"userName":"'.$user->getName().'"}';
    } else {
      echo mysqli_error($connection);
    }
?>