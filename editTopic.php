<?php require_once("header.php"); ?>
  <title>Tópico Atualizado</title>
</head>
<body>
<?php 
require_once("navbar.php"); 
require_once("Models/Issue.php");
require_once("Database/connect.php");
require_once("Database/issue-database.php"); 

$issue = new Issue($_POST["siteName"], $_POST["termUrl"], $_POST["topic"], $_POST["quote"], $_POST["edits"]);
$success = alterIssue($connection, $issue);
if($success) {
?>
<p class="alert alert-success">Tópico atualizado com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($connection);
?>
<p class="alert alert-danger">O tópico não foi atualizado: <?= $msg ?></p>
<?php
}
?>
<?php require_once("post-form.php"); ?>
