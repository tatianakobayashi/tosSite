<?php require_once("header.php"); 

require_once("Models/Issue.php");
require_once("Database/connect.php");
require_once("Database/issue-database.php"); 

$issue = getIssueById($connection, $_POST["issueId"]);
?>
  <title><?=$issue->getTopic()?></title>
</head>
<body>
<?php require_once("navbar.php"); ?>
  <h2> <?php echo $issue->getTopic();?></h2> <br>
  <div>
    <strong>Site: </strong> <span> <?php echo $issue->getSiteName();?></span> <br>
    <strong>Url: </strong> <span> <?php echo $issue->getTosUrl();?></span> <br>
    <strong>Citação: </strong> <span> <?php echo $issue->getQuote();?></span> <br>

    <form action="form.php" method="post">
      <input type="hidden" name="id" value="<?=$issue->getId()?>" />
      <input type="hidden" name="action" value="edit" />
      <button class="btn btn-danger" action="submit">Editar</button>
    </form>

    <form action="newComment.php" method="post">
      <input type="hidden" name="id" value="<?=$issue->getId()?>" />
      <input type="hidden" name="action" value="edit" />
      <button class="btn btn-danger" action="submit">Comentar</button>
    </form>
  </div>

  <?php // Show comments 
  $comments = getCommentsByTopic($connection, $issue->getId());
  if(isset($comments)){
  ?>
    <hr>
    <h3>Comentários</h3>
    <?php foreach ($comments as $comment) { 
      $userName = getUserNameById($connection, $comment->getUserId());
    ?>
      <div class="card">
          <p><span class="user-comment"><strong>Usuário:</strong><?=$userName?></span></p>
          <p><span><strong>Título:</strong><?=$comment->getTitle()?></span></p>
          <p><span><strong>Conteúdo:</strong><?=$comment->getText()?></span></p>
          <p><span><strong>Importância:</strong><?=$comment->getImportance()?></span></p>
          <p><span><strong>Classificação:</strong><?=$comment->getClassification()?></span></p>
      </div>
    <?php ?>
  <?php } // end if?>
</body>
</html>
