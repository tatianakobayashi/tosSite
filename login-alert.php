<?php
    if(isset($user)) {
?>
        <p class="alert alert-success">Login realizado com sucesso!</p>
<?php
    } else {
        $msg = mysqli_error($connection);
?>
        <p class="alert alert-danger">O login não pôde ser realizado: <?= $msg ?></p>
<?php
    }
?>
