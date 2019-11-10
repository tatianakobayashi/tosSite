<?php require_once("header.php"); ?>
	<title>Comentário</title>
</head>
<body>
    <?php require_once("Models/User.php"); ?>
	<?php require_once("navbar.php"); ?>

    <div>
        <span><strong>Título:</strong> </span>
        <span><strong>Conteúdo:</strong> </span>
        <span><strong>Usuário:</strong> </span>
        <form>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>

</body>
</html>