<?php require_once("header.php"); ?>
    <title>Formulário</title>
</head>
<body>
    <?php
    require_once("Database/topic-database.php");
    
    $action = 'new';
    if( isset($_POST['action']) ){
     $action = $_POST['action'];
    }

    $topic = NULL;
    if($action == 'edit'){
        $id = $_POST["id"];
        $topic = getTopicById($connection, $id);
    }

    require_once("navbar.php"); ?> 
    <form method="POST" action="<?php if($action == 'edit'){ echo 'editTranslation.php';} else{echo 'newTranslation.php';} ?>">
        <div class="form-group">
            <label for="english">Tópico em inglês</label>
            <textarea type="text" name="english" class="form-control"><?php echo (isset($topic))?$topic->getEnglish():'';?></textarea>
        </div>

        <div class="form-group">
            <label for="translation">Tradução</label>
            <textarea type="text" name="translation" class="form-control"><?php echo (isset($topic))?$topic->getTranslation():'';?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo (isset($id))?$id:''; ?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
