<?php require_once("header.php"); ?>
	<title>Formulário</title>
</head>
<body>
	<?php
    require_once("connect.php");
	require_once("issue-database.php");
	$action = 'new';
	if( isset($_POST['action']) )
	{
     $action = $_POST['action'];
	}
	$issue = NULL;
	if($action == 'edit'){
        $issueId = $_POST["id"];
        $issue = getIssueById($connection, $issueId);
	}
	require_once("navbar.php"); ?> 
    <form method="POST" action="<?php if($action == 'edit'){ echo 'editTopic.php';} else{echo 'newTopic.php';} ?>">
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
        <!-- <input type="hidden" name="action" value="<?php echo $action; ?>"> -->
        <input type="hidden" name="id" value="<?php echo (isset($issue))?$issueId:''; ?>">
        <input type="hidden" name="edits" value="<?php echo (isset($issue))?$issue->getEdits():0; ?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
