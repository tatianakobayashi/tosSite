<?php require_once("header.php"); ?>
	<title>Perfil do Usuário</title>
</head>
<body>
    <?php require_once("Models/User.php"); ?>
	<?php require_once("navbar.php"); ?>

    <div>
        <p><span><strong>Nome:</strong> </span></p>
        <p><span><strong>Email:</strong> </span></p>
        <form>
            <button type="submit" class="btn btn-primary">Mudar Senha</button>
        </form>
    </div>

</body>
</html>