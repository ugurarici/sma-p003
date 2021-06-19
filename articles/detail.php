<?php
require "inc/init.php";

if (!isset($_GET['id']) || !isset($articles[$_GET['id']])) {
    header("Location: index.php");
    die();
}

$articleId = $_GET["id"];

$article = $articles[$articleId];

include "views/detail.php";
