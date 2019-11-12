<?php require_once("header.php"); 

require_once("Models/Issue.php");
require_once("Models/Comment.php");
require_once("Database/connect.php");
require_once("Database/issue-database.php"); 

$issue = getIssueById($connection, $_POST["issueId"]);
?>
  <title><?php echo $issue->getSiteName();?> - <?=$issue->getTopic()?></title>
</head>
<body>
<?php require_once("navbar.php"); ?>
  <p><h2> <?php echo $issue->getTopic();?></h2></p>
  <div>
    <p><h3> <?php echo $issue->getSiteName();?></h3></p>
    <p><strong>Url: </strong> <span> <?php echo $issue->getTosUrl();?></span></p>
    <p><strong>Citação: </strong> <span> <?php echo $issue->getQuote();?></span></p>

    <div class="btn-toolbar" role="toolbar">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <form action="form.php" method="post">
          <input type="hidden" name="id" value="<?=$issue->getId()?>" />
          <input type="hidden" name="action" value="edit" />
          <button class="btn btn-secondary" action="submit">Editar</button>
        </form>
      </div>

      <div class="btn-group mr-2" role="group" aria-label="First group">
        <form action="newComment.php" method="post">
          <input type="hidden" name="id" value="<?=$issue->getId()?>" />
          <button class="btn btn-primary" action="submit">Comentar</button>
        </form>
      </div>
    </div>
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
        <div class="card-body">
          <h4 class="card-title"><span><strong>Título:</strong><?=$comment->getTitle()?></span></h4>
          <h5 class="card-subtitle"><span><strong>Usuário:</strong><?=$userName?></span></h5>
          <p class="card-text"><span><strong>Conteúdo:</strong><?=$comment->getText()?></span></p>
          <p><span><strong>Importância:</strong><?=$comment->getImportance()?></span></p>
          <p><span><strong>Classificação:</strong><?=$comment->getClassification()?></span></p>
        </div>
      </div>
  <?php 
    } // end for
  }// end if
  else{
    echo "<p>Não existem comentários para este tópico</p>";
  }
  ?>
</body>
</html>
