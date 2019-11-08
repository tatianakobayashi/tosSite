<?php
require_once("Models/Topic.php");
function insertTopic($connection, $topic) {
    $query = "insert into topics (english, translation) values ('{$topic->getEnglish()}', '{$topic->getTranslation()}')";
    return mysqli_query($connection, $query);
}

function getAllTopics($connection) {
    $topics = array();
    $result = mysqli_query($connection, "select * from topics");
    while($arr = mysqli_fetch_assoc($result)) {
        $topic = new Topic($arr["english"], $arr["translation"]);
        $topic->setId($arr["id"]);
        array_push($topics, $topic);
    }
    return $topics;
}

function getAllTopicsAsArray($connection) {
    $topics = array();
    $result = mysqli_query($connection, "select * from topics");
    while($arr = mysqli_fetch_assoc($result)) {
        $topics[$arr["english"]] = $arr["translation"];
    }
    return $topics;
}

function alterTopic($connection, $topic) {
    $query = "update topics set site = '{$topic->getEnglish()}', url = '{$topic->getTranslation()}' where id = {$topic->getId() }";
    return mysqli_query($connection, $query);
}

function removeTopic($connection, $id) {
    $query = "delete from topics where id = {$id}";
    return mysqli_query($connection, $query);
}

function getTopicById($connection, $id) {
    $query = "select * from topics where id = {$id}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    $topic = new Topic($arr["english"], $arr["translation"]);
    $topic->setId($arr["id"]);
    return $topic;
}

function getTopicBySite($connection, $site) {
    $query = "select * from topics where site = {$site}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    $topic = new Topic($arr["english"], $arr["translation"]);
    $topic->setId($arr["id"]);
    return $topic;
}
