<?php require_once("header.php"); ?>
  <title>Novo Tópico</title>
</head>
<body>
<?php 
require_once("navbar.php"); 
require_once("Models/Issue.php");
require_once("issue-database.php"); 
  
$issue = new Issue($_POST["siteName"], $_POST["termUrl"], $_POST["topic"], $_POST["quote"], 0);

$success = insertIssue($connection, $issue);

if($success) {
?>
<p class="alert alert-success">Tópico adicionado com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($connection);
?>
<p class="alert alert-danger">O tópico não foi adicionado: <?= $msg ?></p>
<?php
}
?>
    <div>
        <strong>Site: </strong> <span> <?php echo $issue->getSiteName();?></span> <br>
        <strong>Url: </strong> <span> <?php echo $issue->getTosUrl();?></span> <br>
        <strong>Tópico: </strong> <span> <?php echo $issue->getTopic();?></span> <br>
        <strong>Citação: </strong> <span> <?php echo $issue->getQuote();?></span> <br>
    </div>
</body>
</html>
