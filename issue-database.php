<?php

require_once("connection.php");

function insertIssue($connection, $issue) {
    $query = "insert into issues (site, url, topic, quote, edits) values ('{$issue->site}', {$issue->url}, {$issue->topic}, {$issue->quote}, 0)";
    return mysqli_query($connection, $query);
}

function getAllIssues($connection) {
    $issues = array();
    $result = mysqli_query($connection, "select * from issues");

    while($issue = mysqli_fetch_assoc($result)) {
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
    return mysqli_fetch_assoc($result);
}

function getIssueBySite($connection, $site) {
    $query = "select * from issues where site = {$site}";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_assoc($result);
}