<?php require_once("header.php"); ?>
	<title>Tradução</title>
</head>
<body>
    <?php require_once("Models/Topic.php");
	require_once("navbar.php"); 
	require_once("Database/connect.php");
	require_once("Database/topic-database.php"); 
	
	if(isset($_POST["topicId"])){
		$topic = getTopicById($connection, $_POST["topicId"]);
	}
	
	?>

    <div>
        <p><span><strong>Tópico original:</strong><?=isset($topic)?$topic->getEnglish():''?></span></p>
        <p><span><strong>Tradução:</strong><?=isset($topic)?$topic->getTranslation():''?></span></p>
    <?php if(isset($topic)){?>
        <form method="POST" action="editTranslation.php">
		<input type="hidden" value="<?=$_POST["topicId"]?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    <?php }?>
    </div>

</body>
</html>
