<?php
require_once("Models/Issue.php");
require_once("connect.php");

function insertIssue($connection, $issue) {
    $query = "insert into issues (site, url, topic, quote, edits) values ('{$issue->getSiteName()}', '{$issue->getTosUrl()}', '{$issue->getTopic()}', '{$issue->getQuote()}', 0)";
    return mysqli_query($connection, $query);
}

function getAllIssues($connection) {
    $issues = array();
    $result = mysqli_query($connection, "select * from issues");

    while($arr = mysqli_fetch_assoc($result)) {
        $issue = new Issue($arr["site"], $arr["url"], $arr["topic"], $arr["quote"], $arr["edits"]);
        $issue->setId($arr["id"]);
        array_push($issues, $issue);
    }

    return $issues;
}

function alterIssue($connection, $id, $site, $url, $topic, $quote, $edits) {
	$edits += 1;
    $query = "update issues set site = '{$site}', url = {$url}, topic = '{$topic}',
        quote= {$quote}, edits = {$edits} where id = '{$id}'";
    return mysqli_query($connection, $query);
}

function removeIssue($connection, $id) {
    $query = "delete from issues where id = {$id}";
    return mysqli_query($connection, $query);
}

function getIssueById($connection, $id) {
    $query = "select * from issues where id = {$id}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    $issue = new Issue($arr["siteName"], $arr["termUrl"], $arr["topic"], $arr["quote"], $arr["edits"]);
    $issue->setId($arr["id"]);
    return $issue;
}

function getIssueBySite($connection, $site) {
    $query = "select * from issues where site = {$site}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    $issue = new Issue($arr["siteName"], $arr["termUrl"], $arr["topic"], $arr["quote"], $arr["edits"]);
    $issue->setId($arr["id"]);
    return $issue;
}
