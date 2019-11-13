<?php
// get services + issues
$services = getAllServices($connection)
// list services w/ topics underneath
foreach ($services as $service){
// topics lead to showIssue.php
$issues = getIssueBySite($connection, $service);
?>
<div class="card" style="display: inline-block;" id="<?=$no_space_service_name?><?=$service_id?>">
    <div class="card-body">
    <!-- Nome do serviço e Classificação -->
    <h5 class="card-title"> <?= $value->name?> </h5>
    <p class="card-text <?=$rating_color_class[$value->rated]?>"> <?= $rating_to_string[$value->rated]?> </p>

    <h5 class="card-title"><a data-toggle="collapse" data-target="#point<?=$no_space_service_name?>ListAccordion" aria-expanded="false" aria-controls="point<?=$no_space_service_name?>ListAccordion" role="button">Tópicos</a></h5>
    <div class="accordion collapse" id="point<?=$no_space_service_name?>ListAccordion">
    <?php 
    foreach ($issues as $issue) {
        $score = $point_value->point;
    ?>
        
        <div class="card <?=$point_alert[$score]?>">
        <div class="card-header" id="heading<?=$point_value->id?>">
            <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?=$point_value->id?>" aria-expanded="true" aria-controls="collapse<?=$point_value->id?>">
                <!-- ?= //isset($translation[$point_value->title])?$translation[$point_value->title]:$point_value->title?> -->
                <?= $point_value->title?>
            </button>
            </h2>
        </div>

        <div id="collapse<?=$point_value->id?>" class="collapse" aria-labelledby="heading<?=$point_value->id?>" data-parent="#point<?=$no_space_service_name?>ListAccordion">
            <div class="card-body">
            <!-- ?= //isset($translation[$point_value->description])?$translation[$point_value->description]:$point_value->description?> <br /> -->
            <?= $point_value->description?> <br />
            <strong><?= $point_translation[$score]?></strong><br />
            <strong>Importância: </strong> <?= $point_value->score ?><br />
            <a href="<?= $point_value->discussion?>">Discussão</a><br />
            </div>
        </div>
        </div>

    <?php } // end foreach points ?>
    </div>
    
    <!-- Lista de urls dos termos analisados -->
    <?php if (count($value->documents) > 0){ ?>
    <h5 class="card-title"><a data-toggle="collapse" data-target="#link<?=$no_space_service_name?>List" aria-expanded="false" aria-controls="link<?=$no_space_service_name?>List" role="button">Links</a></h5>
    <?php }?>
    <ul class="list-group list-group-flush collapse" id="link<?=$no_space_service_name?>List">
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
?>
