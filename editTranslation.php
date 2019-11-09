<?php require_once("header.php"); ?>
  <title>Tradução Atualizada</title>
</head>
<body>
<?php 
require_once("navbar.php"); 
require_once("Models/Topic.php");
require_once("Database/connect.php");
require_once("Database/topic-database.php"); 

$topic = new Topic($_POST["english"], $_POST["translation"]);
$success = alterTopic($topic);

if($success) {
?>
<p class="alert alert-success">Tradução atualizada com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($connection);
?>
<p class="alert alert-danger">A tradução não foi atualizada: <?= $msg ?></p>
<?php
}
?>
<?php require_once("post-translation-form.php"); ?>
