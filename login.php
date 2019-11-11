<?php include_once('header.php');?>
<title>Login</title>
</head>

<body>
<?php include_once('navbar.php');?>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="email">Usuário</label>
            <input type="email" name="email" class="form-control" hint="Email" />
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control" hint="Senha"/>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

</body>
</html>
