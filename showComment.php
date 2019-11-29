<?php require_once("header.php"); ?>
  <title>Comentário</title>
</head>
<body>
    <?php 
  require_once("Models/Comment.php"); 
  require_once("navbar.php");
  require_once("Database/connect.php"); 
  require_once("Database/comment-database.php"); 
  require_once("Database/user-database.php"); 
  require_once("Database/issue-database.php"); 
  
  if(isset($_POST["commentId"])){
    $comment = getCommentById($connection, $_POST["commentId"]);
    $userName = getUserNameById($connection, $comment->getUserId());
    $topic = getIssueById($connection,  $comment->getTopicId());
  }
  else if(isset($_POST) && isset($_SESSION["userId"])){
    $success = insertComment($connection, $_POST["title"], $_POST["text"], $_POST["importance"], $_POST["classification"], $_POST["topicId"], $_SESSION["userId"]);
    if($success) {
      $comment = new Comment($_POST["title"], $_POST["text"], $_POST["importance"], $_POST["classification"], $_POST["topicId"], $_SESSION["userId"]);
      $comment->setId($connection->insert_id);
  ?>
      <p class="alert alert-success">Comentário inserido com sucesso!</p>
  <?php
    } else {
      $msg = mysqli_error($connection);
  ?>
      <p class="alert alert-danger">O tópico não foi inserido: <?= $msg ?></p>
  <?php
    }
  }
  ?>
    <div>
        <p><span><strong>Título: </strong><?=isset($comment)?$comment->getTitle():'Indisponível'?></span></p>
        <p><span><strong>Conteúdo: </strong><?=isset($comment)?$comment->getText():'Indisponível'?></span></p>
        <p><span><strong>Importância: </strong><?=isset($comment)?$comment->getImportance():'Indisponível'?></span></p>
        <p><span><strong>Classificação: </strong><?=isset($comment)?$comment->getClassification():'Indisponível'?></span></p>
        <p><span><strong>Tópico: </strong><?=isset($topic)?$topic->getTopic():'Indisponível'?></span></p>
        <p><span><strong>Usuário: </strong><?=isset($userName)?$userName:'Indisponível'?></span></p>
    </div>

</body>
</html>
