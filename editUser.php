<?php require_once("header.php"); ?>
	<title>Formulário</title>
</head>
<body>
	<?php
    require_once("Database/connect.php");
    require_once("Database/user-database.php");

	$user = NULL;
	if( isset($_POST['id'])){
        $id = $_POST["id"];
        $user = getUserById($connection, $id);
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
            <label for="experience">Experiência</label>
            <select class="form-control" id="experience" value="<?php echo (isset($user))?$user->getExperience():'';?>">
                <option value="Leigo">Leigo</option>
                <option value="Intermediário">Intermediário</option>
                <option value="Profissional">Profissional</option>
            </select>
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
        <input type="hidden" name="id" value="<?= $id?>">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>