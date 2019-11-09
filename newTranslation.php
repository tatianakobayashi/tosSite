<?php require_once("header.php"); ?>
  <title>Nova Tradução</title>
</head>
<body>
<?php 
require_once("navbar.php"); 
require_once("Models/Topic.php");
require_once("Database/connect.php");
require_once("Database/topic-database.php"); 
  
$topic = new Topic($_POST["english"], $_POST["translation"]);
$success = insertTopic($connection, $topic);

if($success) {
?>
<p class="alert alert-success">Tradução adicionada com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($connection);
?>
<p class="alert alert-danger">A tradução não foi adicionada: <?= $msg ?></p>
<?php
}
?>
<?php require_once("post-translation-form.php"); ?>
