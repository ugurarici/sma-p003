<?php
require "inc/init.php";

$articleId = handleArticleId();
$article = getArticleDetail($articleId);
$articles = getAllArticles();

include "views/detail.php";
