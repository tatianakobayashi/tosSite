
<?php
session_unset();
session_destroy();
include_once('header.php');
?>
<title>Logout</title>
</head>
<body>
  <?php include_once('navbar.php');?>
  <div>
    <?php if(!isset($_SESSION['userId'])){?>
      <div class="alert alert-primary" role="alert">
        Logout realizado com sucesso.
      </div>
    <?php }else{?>
      <div class="alert alert-warning" role="alert">
        A sessão não pôde ser terminada.
      </div>
    <?php } // end if/else ?>
  </div>
</body>
</html>
