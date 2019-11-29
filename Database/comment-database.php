<?php
require_once("Models/Comment.php"); // ($title, $text, $importance, $classification, $topicId, $userId)
function insertComment($connection, $title, $text, $importance, $classification, $topicId, $userId) {
    $query = "insert into comments (title, text, importance, classification, topicId, userId) values ('{$title}', '{$text}', {$importance}, '{$classification}', {$topicId}, {$userId})";
    return mysqli_query($connection, $query);
}

function removeComment($connection, $id) {
    $query = "delete from comments where id = {$id}";
    return mysqli_query($connection, $query);
}

function getAllComments($connection) {
    $comments = array();
    $result = mysqli_query($connection, "select * from comments");
    while($arr = mysqli_fetch_assoc($result)) {
        $comment = new Comment($arr["title"], $arr["text"], $arr["importance"], $arr["classification"], $arr["topicId"], $arr["userId"]);
        $comment->setId($arr["id"]);
        array_push($comments, $comment);
    }
    return $comments;
}

function alterComment($connection, $comment) {
    $query = "update comments set title = '{$comment->getTitle()}', text = '{$comment->getText()}', importance={$comment->getImportance()}, classification = '{$comment->getClassification()}' where id = {$comment->getId()} and topicId = {$comment->getTopicId()} and userId = {$comment->getUserId()}";
    return mysqli_query($connection, $query);
}

function getCommentById($connection, $id) {
    $query = "select * from comments where id = {$id}";
    $result = mysqli_query($connection, $query);
    $arr = mysqli_fetch_assoc($result);
    $comment = new Comment($arr["title"], $arr["text"], $arr["importance"], $arr["classification"], $arr["topicId"], $arr["userId"]);
    $comment->setId($arr["id"]);
    return $comment;
}

function getCommentByUserId($connection, $userId) {
    $query = "select * from comments where userId = {$userId}";
    $comments = array();
    $result = mysqli_query($connection, $query);
    while($arr = mysqli_fetch_assoc($result)) {
        $comment = new Comment($arr["title"], $arr["text"], $arr["importance"], $arr["classification"], $arr["topicId"], $arr["userId"]);
        $comment->setId($arr["id"]);
        array_push($comments, $comment);
    }
    return $comments;
}

function getCommentsByTopic($connection, $topicId) {
    $query = "select * from comments where topicId = {$topicId}";
    $comments = array();
    $result = mysqli_query($connection, $query);
    while($arr = mysqli_fetch_assoc($result)) {
        $comment = new Comment($arr["title"], $arr["text"], $arr["importance"], $arr["classification"], $arr["topicId"], $arr["userId"]);
        $comment->setId($arr["id"]);
        array_push($comments, $comment);
    }
    return $comments;
}
