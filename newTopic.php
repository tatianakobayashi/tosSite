<?php require_once("header.php"); ?>
  <title>Novo Tópico</title>
</head>
<body>
<?php 
require_once("navbar.php"); 
require_once("Models/Issue.php");

$issue = new Issue($_POST["siteName"], $_POST["termUrl"], $_POST["topic"], $_POST["quote"]);

// Inserir no banco

?> 

    <div>
        <strong>Site: </strong> <span> <?php echo $issue->getSiteName();?></span>
        <strong>Url: </strong> <span> <?php echo $issue->getTosUrl();?></span>
        <strong>Tópico: </strong> <span> <?php echo $issue->getTopic();?></span>
        <strong>Citação: </strong> <span> <?php echo $issue->getQuote();?></span>
    </div>
</body>
</html>
