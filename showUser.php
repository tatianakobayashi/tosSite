<?php require_once("header.php"); ?>
	<title>Perfil do Usuário</title>
</head>
<body>
    <?php require_once("Models/User.php"); ?>
	<?php require_once("navbar.php"); ?>

    <div>
        <span><strong>Nome:</strong> </span>
        <span><strong>Email:</strong> </span>
        <form>
            <button type="submit" class="btn btn-primary">Mudar Senha</button>
        </form>
    </div>

</body>
</html>