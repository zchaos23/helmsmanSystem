<?php
require_once "config.php";

$name = $_POST['name'];
$description = $_POST['description'];
$tags = $_POST['tags'];
$tagArray = explode(" ",$_POST['tags']);
$tag1 = $tagArray[0];
$tag2 = $tagArray[1];
$tag3 = $tagArray[2];
$url = $_POST['url'];

$result = $link->query("insert into list (name, description, tags, tag1, tag2, tag3, url) values ('$name', '$description', '$tags', '$tag1', '$tag2', '$tag3', '$url')");

header('location:index.php');