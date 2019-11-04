<?php require_once("header.php"); ?>
	<title>Formulário</title>
</head>
<body>
	<?php
	include("connect.php");
	$action = 'new';
	if( isset($_POST['action']) )
	{
     $action = $_POST['action'];
	}

	$issue = NULL;
	if($action == 'edit'){
		$issue = new Issue($_POST["siteName"], $_POST["termUrl"], $_POST["topic"], $_POST["quote"]);
	}

	require_once("navbar.php"); ?> 
    <form method="POST">
        <div class="form-group">
            <label for="siteName">Site</label>
            <input type="text" name="siteName" class="form-control" value="<?php echo (isset($issue))?$issue->getSiteName():'';?>" />
        </div>

        <div class="form-group">
            <label for="termUrl">Url do Site</label>
            <input type="text" name="termUrl" class="form-control" value="<?php echo (isset($issue))?$issue->getTosUrl():'';?>"/>
        </div>
        <div class="form-group">
            <label for="topic">Tópico</label>
            <input type="text" name="topic" class="form-control" value="<?php echo (isset($issue))?$issue->getTopic():'';?>"/>
        </div>
        <!--<label for="otherTopic">Outro tópico</label>
        <input type="text" name="otherTopic"/>-->

        <div class="form-group">
            <label for="quote">Trecho do termo em questão</label>
            <textarea type="text" name="quote" class="form-control" value="<?php echo (isset($issue))?$issue->getQuote():'';?>"></textarea>
        </div>
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
