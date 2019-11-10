<?php
    if($login) {
?>
        <p class="alert alert-success">Tópico adicionado com sucesso!</p>
<?php
    } else {
        $msg = mysqli_error($connection);
?>
        <p class="alert alert-danger">O tópico não foi adicionado: <?= $msg ?></p>
<?php
    }
?>