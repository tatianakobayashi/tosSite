<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Termos de Uso</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Classificação dos sites</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="translation-form.php">Adicionar Tradução de Tópico</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="form.php">Adicionar Novo Tópico</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="topicTable.php">Tópicos Adicionados</a>
            </li>
            
            <?php if(isset($_SESSION["userId"])){?>
                <li class="nav-item">
                    <a class="nav-link" href="showUser.php"><?=$_SESSION["userName"]?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            <?php }else{?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newUser.php">Criar Novo Usuário</a>
                </li>
            <?php }?>
        </ul>
    </div>
</nav>

