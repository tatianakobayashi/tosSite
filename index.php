<?php require_once("header.php"); ?>  
<title>Termos de Uso</title>
</head>
<body>
<?php
  require_once("Database/connect.php");
  require_once("Database/user-database.php");

  if(isset($_POST["email"]) && isset($_POST["password"])) {
    $user = getUser($connection, $_POST["email"], $_POST["password"]);

    $_SESSION["userId"] = $user->getId();
    $_SESSION["userName"] = $user->getName();
  }
  require_once("navbar.php"); 
  
  if(isset($_POST["email"]) && isset($_POST["password"])){
    require_once("login-alert.php");
  }
  include_once('dictionaries.php');  
  ?> 

  <!-- Cabeçalho -->
  <div class="header" id="home">
    <h1>Termos de Uso</h1>
    
    Informações sobre a classificação retiradas da API da organização TOS;DR.
  </div>

  <ul class="nav nav-tabs" id="indexTabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="servicesListTab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="true">Classificação dos sites</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="topics-tab" data-toggle="tab" href="#topics" role="tab" aria-controls="topics" aria-selected="false">Tópicos Locais</a>
    </li>
  </ul>

  <div class="tab-content" id="indexTabContent">
    <div class="tab-pane fade show active" id="services" role="tabpanel" aria-labelledby="servicesListTab">
      <p><h3>Classificação dos sites de acordo com a organização ToS;DR</h3></p>
      <div class="card-columns">
        <?php include_once('service-list-tosdr.php'); ?>
      </div>
    </div>
    <div class="tab-pane fade" id="topics" role="tabpanel" aria-labelledby="topics-tab">
      <p><h3>Tópicos Locais</h3></p>
      <div class="list">
        <?php include_once('service-list-local.php'); ?>
      </div>
    </div>
  </div>

</body>
</html>
