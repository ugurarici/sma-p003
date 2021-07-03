<?php
require "inc/init.php";

$article = Article::find($_GET['id']);

if (!$article) {
    header("Location: index.php");
    die();
}

$articles = Article::all();

include "views/detail.php";
