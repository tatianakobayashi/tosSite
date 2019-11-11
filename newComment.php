<?php require_once("header.php"); ?> 
    <title>Novo Comentário</title>
</head>
<body>
    <?php require_once("navbar.php"); ?> 
    <form method="POST" action="showComment.php">
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="text">Comentário</label>
            <textarea type="text" name="text" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="importance">Importância <small>De 0 a 100</small></label>
            <input type="text" name="importance" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="classification">Classificação</label>
            <select class="form-control" id="classification">
                <option value="bom">bom</option>
                <option value="neutro">neutro</option>
                <option value="ruim">ruim</option>
            </select>
        </div>

        <input type="hidden" name="topicId" value="<?php=$_POST["topicId"]?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
