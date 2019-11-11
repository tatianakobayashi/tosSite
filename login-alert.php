<?php
    require_once("Database/connect.php");
    require_once("Database/user-database.php");

    $user = getUser($connection, $_POST["email"], $_POST["password"]);

    if(isset($user)) {
        $_SESSION["userId"]  =$user->getId();
        $_SESSION["userName"]  =$user->getName();
?>
        <p class="alert alert-success">Login realizado com sucesso!</p>
<?php
    } else {
        $msg = mysqli_error($connection);
?>
        <p class="alert alert-danger">O login não pôde ser realizado: <?= $msg ?></p>
<?php
    }
?>
