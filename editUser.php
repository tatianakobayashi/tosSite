<?php require_once("header.php"); ?>
	<title>Formulário</title>
</head>
<body>
	<?php
    require_once("Database/connect.php");
    // include database

	$user = NULL;
	if( isset($_POST['id'])){
        $user = $_POST["id"];
        // $user = getUserById($connection, $iuserId);
	}
	require_once("navbar.php"); ?> 

    <form method="POST" action="showUser.php">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo (isset($user))?$user->getName():'';?>" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo (isset($user))?$user->getEmail():'';?>"/>
        </div>

        <div class="form-group">
            <label for="oldPassword">Senha atual</label>
            <input type="password" name="oldPassword" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="password1">Senha nova</label>
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