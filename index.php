<?php require_once("header.php"); ?>  
<title>Termos de Uso</title>
</head>
<body>
<?php require_once("navbar.php"); ?> 

  <!-- Cabeçalho -->
  <div class="header" id="home">
    <h1>Termos de Uso</h1>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </div>
  <!-- Busca de site/tópico -->

  <div class="search">
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
        <?php 
          $json = file_get_contents('https://tosdr.org/api/1/all.json');
          $obj = json_decode($json);

          $rating_to_string = array(
            0=> "Sem classificação",
            "false"=> "Sem classificação",
            "A"=> "Os Termos de serviço te tratam de forma justa, respeitam seus direitos e seguem as melhores práticas.",
            "B"=> "Os Termos de serviço são justos com o usuário, mas podem ser melhorados.",
            "C"=> "Os Termos de serviço são bons, mas alguns problemas precisam da sua consideração.",
            "D"=> "Os Termos de serviço são muito irregulares ou existem problemas importantes que necessitam da sua atenção.",
            "E"=> "Os Termos de serviço levantam sérias preocupações."
          );

          $point_translation = array(
            "bad"=> "Ruim",
            "good"=> "Bom",
            "neutral"=> "Neutro"
          );

          $point_alert = array(
            "bad"=> "text-white bg-danger",
            "good"=> "text-white bg-success",
            "neutral"=> "text-white bg-info",
            "undefined"=> "bg-light"
          );

          $rating_color_class = array(
            0=> "black",
            "false"=> "black",
            "A"=> "green",
            "B"=> "yellow",
            "C"=> "orange",
            "D"=> "red",
            "E"=> "burgundy"
          );

          
          foreach ($obj as $key=> $value){
            if(preg_match('/^tosdr.review..*/', $key)){
              if(!isset($value->see)){
                $no_space_service_name = str_replace(' ', '', $value->name);
                $no_space_service_name = str_replace('.', '_', $no_space_service_name);
                $no_space_service_name = str_replace(',', '_', $no_space_service_name);
                $service_id = '-service';
                ?>
                <div class="card p-1" style="display: inline-block;" id="<?=$no_space_service_name?><?=$service_id?>">
                  <div class="card-body">
                    <!-- Nome do serviço e Classificação -->
                    <h5 class="card-title"> <?= $value->name?> </h5>
                    <p class="card-text <?=$rating_color_class[$value->rated]?>"> <?= $rating_to_string[$value->rated]?> </p>
                    
                    <?php 
                    // foreach ($value->points as $point_key => $point_value) {
                    //   echo $point_value->title;
                    // }
                    ?>

                    <h5 class="card-title"><a data-toggle="collapse" data-target="#point<?=$no_space_service_name?>ListAccordion" aria-expanded="false" aria-controls="point<?=$no_space_service_name?>ListAccordion" role="button">Tópicos</a></h5>
                    <div class="accordion collapse" id="point<?=$no_space_service_name?>ListAccordion">
                    <?php 
                    foreach ($value->points as $point_key => $point_value) {
                    ?>
                      
                      <div class="card">
                        <div class="card-header" id="heading<?=$point_value->id?>">
                          <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?=$point_value->id?>" aria-expanded="true" aria-controls="collapse<?=$point_value->id?>">
                              <?= $point_value->title?>
                            </button>
                          </h2>
                        </div>

                        <div id="collapse<?=$point_value->id?>" class="collapse" aria-labelledby="heading<?=$point_value->id?>" data-parent="#point<?=$no_space_service_name?>ListAccordion">
                          <div class="card-body">
                            <?= $point_value->description?> <br />
                            <strong>Importância: </strong> <?= $point_value->score ?><br />
                            <a href="<?= $point_value->discussion?>">Discussão</a><br />
                          </div>
                        </div>
                      </div>

                    <?php } // end foreach points ?>
                    </div>
                    
                    <!-- Lista de urls dos termos analisados -->
                    <?php if (count($value->documents) > 0){ ?>
                    <h5 class="card-title"><a data-toggle="collapse" data-target="#<?=$no_space_service_name?>linkList" aria-expanded="false" aria-controls="<?=$no_space_service_name?>linkList" role="button">Links</a></h5>
                    <?php }?>
                    <ul class="list-group list-group-flush collapse" id="<?=$no_space_service_name?>linkList">
                      <?php 
                      foreach ($value->documents as $doc_key => $doc_value) {
                      ?>
                        <li class="list-group-item"><a href="<?=$doc_value->url?>"><?=$doc_value->name?></a></li>
                      <?php } // end foreach documents ?>
                    </ul>
                  </div>
                </div>
                <?php
              }
            }
          }

        

        ?>
      </div>
    </div>
    <div class="tab-pane fade" id="topics" role="tabpanel" aria-labelledby="topics-tab">
      <h3>Topicos do ToS;DR</h3>
      <div class="list">
        Tópicos criados pelo TOS;DR..............
      </div>
    </div>
  </div>

  <div>
  <a href="form.php">Formulário</a>
  <a href="topicTable.php">Tabela</a>

  </div>

  <p>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#test" aria-expanded="false" aria-controls="test">
      Button with data-target
    </button>
  </p>
  <div class="collapse" id="test">
    <div class="card card-body">
      Hi
    </div>
  </div>
  <p></p>

</body>
</html>
