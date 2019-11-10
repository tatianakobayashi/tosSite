<?php require_once("header.php"); ?>
	<title>Criar novo usuário</title>
</head>
<body>
	<?php require_once("navbar.php"); ?> 
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password1">Senha</label>
            <input type="password" name="password1" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="password2">Repita a senha</label>
            <input type="password" name="password2" class="form-control"/>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>