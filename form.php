<?php require_once("header.php"); ?>
	<title>Formulário</title>
</head>
<body>
<?php require_once("navbar.php"); ?> 
    <form method="POST">
        <div class="form-group">
            <label for="siteName">Site</label>
            <input type="text" name="siteName" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="termUrl">Url do Site</label>
            <input type="text" name="termUrl" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="topic">Tópico</label>
            <input type="text" name="topic" class="form-control"/>
        </div>
        <!--<label for="otherTopic">Outro tópico</label>
        <input type="text" name="otherTopic"/>-->

        <div class="form-group">
            <label for="quote">Trecho do termo em questão</label>
            <textarea type="text" name="quote" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>