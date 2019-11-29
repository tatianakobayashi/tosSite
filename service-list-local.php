<?php
// get services + issues

include_once('Database/connect.php');
include_once('Database/issue-database.php');
$services = getAllServices($connection);

// list services w/ topics underneath
if(is_array($services)){
foreach($services as $service){
  $issues = getIssuesBySite($connection, $service);
  ?>
  <div class="card" id="local<?=$service?>">
  <div class="card-body">
    <h5 class="card-title"> <?= $service?> </h5>
    <h5 class="card-title"><a data-toggle="collapse" data-target="#local<?=$service?>ListAccordion" aria-expanded="false" aria-controls="local<?=$service?>ListAccordion" role="button">Tópicos</a></h5>
    <div class="accordion collapse" id="local<?=$service?>ListAccordion">
  <?php
      foreach($issues as $issue){
        ?>
        <div class="card-header" id="headingLocal<?=$issue->getId()?>">
            <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseLocal<?=$issue->getId()?>" aria-expanded="true" aria-controls="collapseLocal<?=$issue->getId()?>">
                <?= $issue->getQuote()?>
            </button>
            </h2>
        </div>

        <div id="collapseLocal<?=$issue->getId()?>" class="collapse" aria-labelledby="headingLocal<?=$issue->getId()?>" data-parent="#local<?=$service?>ListAccordion">
            <div class="card-body">
            <?= $issue->getTopic()?> <br />
            <a href="showIssue.php?issueId=<?=$issue->getId()?>">Discussão</a><br />
            </div>
        </div>
        <?php
      }
  ?>
    </div>
  <?php
    $urls = getAllUrlsBySite($connection, $service);
  ?>
    <h5 class="card-title"><a data-toggle="collapse" data-target="#localLink<?=$service?>List" aria-expanded="false" aria-controls="localLink<?=$service?>List" role="button">Links</a></h5>
    <ul class="list-group list-group-flush collapse" id="localLink<?=$service?>List">
  <?php
      foreach($urls as $url){
        ?>
        <li class="list-group-item"><a href="<?=$url?>"><?=$url?></a></li>
        <?php
      }
  ?>
    </ul>
  </div>
  </div>
  <hr>
  <?php
} // Fim for
} // Fim if
?>
