<?php require_once("header.php"); ?>  
<title>Termos de Uso</title>
</head>
<body>
<?php require_once("navbar.php"); 
  
  if(isset($_POST["email"]) && isset($_POST["password"])){
    require_once("login-alert.php");
  }
  include_once('dictionaries.php');  
  ?> 

  <!-- Cabeçalho -->
  <div class="header" id="home">
    <h1>Termos de Uso</h1>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>

  <ul class="nav nav-tabs" id="indexTabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="servicesListTab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="true">Classificação dos sites</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="topics-tab" data-toggle="tab" href="#topics" role="tab" aria-controls="topics" aria-selected="false">Topicos do ToS;DR</a>
    </li>
  </ul>

  <div class="tab-content" id="indexTabContent">
    <div class="tab-pane fade show active" id="services" role="tabpanel" aria-labelledby="servicesListTab">
      <h3>Classificação dos sites</h3>
      <div class="card-columns">
        <?php include_once('service-list-tosdr.php'); ?>
      </div>
    </div>
    <div class="tab-pane fade" id="topics" role="tabpanel" aria-labelledby="topics-tab">
      <h3>Topicos do ToS;DR</h3>
      <div class="list">
        Tópicos criados pelo TOS;DR..............
      </div>
    </div>
  </div>

</body>
</html>
