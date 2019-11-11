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
	?>
    <div>
        <p><span><strong>Título:</strong><?=isset($comment)?$comment->getTitle():'Indisponível'?></span></p>
        <p><span><strong>Conteúdo:</strong><?=isset($comment)?$comment->getText():'Indisponível'?></span></p>
        <p><span><strong>Importância:</strong><?=isset($comment)?$comment->getImportance():'Indisponível'?></span></p>
        <p><span><strong>Classificação:</strong><?=isset($comment)?$comment->getClassification():'Indisponível'?></span></p>
        <p><span><strong>Tópico:</strong><?=isset($topic)?$topic->getTopic():'Indisponível'?></span></p>
        <p><span><strong>Usuário:</strong><?=isset($userName)?$userName:'Indisponível'?></span></p>
        <form>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>

</body>
</html>
