<?php require_once("header.php"); ?>
    <title>Perfil do Usuário</title>
</head>
<body>
    <?php 
    require_once("Models/User.php");
    require_once("navbar.php"); 
    require_once("Database/connect.php");
    require_once("Database/user-database.php");
    
    
    
    if(isset($_POST["oldPassword"])){
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

    if(isset($_POST["password1"]) && isset($_POST["password2"])){
        $success = insertUser($connection, $_POST["name"], $_POST["email"], $_POST["experience"], $_POST["password1"], $_POST["password2"]);
        if($success) {
            $user = getUser($connection, $_POST["email"], $_POST["password1"]) ;
            $_SESSION["userId"] = $user->getId();
            $_SESSION["userName"] = $_POST["name"];
    ?>
            <p class="alert alert-success">Usuário criado com sucesso!</p>
    <?php
        } else {
            $msg = mysqli_error($connection);
    ?>
            <p class="alert alert-danger">Não foi possível criar o usuário: <?= $msg ?></p>
    <?php
        }
    }
    
    if(!isset($user) && isset($_SESSION["userId"])){
        $user = getUserById($connection, $_SESSION["userId"]);
    }

    if(!isset($_SESSION["userId"])){
        ?>
        <p class="alert alert-danger">Você não está logado</p>
        <?php
    }
    ?>

    <div>
        <p><span><strong>Nome: </strong><?=isset($user)?$user->getName():''?> </span></p>
        <p><span><strong>Email: </strong><?=isset($user)?$user->getEmail():''?> </span></p>        
        <p><span><strong>Experiência: </strong><?=isset($user)?$user->getExperience():''?> </span></p>

    </div>
    <div hidden=<?=isset($user)?false:true?>>
        <form action="editUser.php" action="POST">
            <input type="hidden" value="<?=isset($user)?$user->getId():''?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>

</body>
</html>
