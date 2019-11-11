<?php require_once("header.php"); ?>
	<title>Perfil do Usuário</title>
</head>
<body>
    <?php 
    require_once("Models/User.php");
    require_once("navbar.php"); 
    require_once("Database/connect.php");
    require_once("Database/user-database.php");
	
    
    
    if(isset($_POST)){
        $success = alterUser($connection, $_POST["id"], $_POST["name"], $_POST["email"], $_POST["experience"], $_POST["oldPassword"], $_POST["password1"], $_POST["password2"]);
        if($success) {
            $user = getUserById($connection, $_POST["id"]);
    ?>
            <p class="alert alert-success">Usuário alterado com sucesso!</p>
    <?php
        } else {
            $msg = mysqli_error($connection);
    ?>
            <p class="alert alert-danger">O usuário não foi alterado: <?= $msg ?></p>
    <?php
        }
    }
	
    if(!isset($user) && isset($_SESSION["userId"])){
    	$user = getUserById($connection, $_SESSION["userId"]);
    }
    ?>

    <div>
        <p><span><strong>Nome: </strong><?=isset($user)?$user->getName():''?> </span></p>
        <p><span><strong>Email: </strong><?=isset($user)?$user->getEmail():''?> </span></p>        
        <p><span><strong>Experiência: </strong><?=isset($user)?$user->getExperience():''?> </span></p>

    </div>

</body>
</html>
