<?php
//  uygulamanın mevcut verisine erişimimiz olmalı
require "inc/init.php";

redirectIfNotLoggedIn();

$article = Article::find($_GET['id']);

if ($article) {
    $article->delete();
}

//  burada işimiz bitti, ana sayfaya gidelim
header("Location: index.php");
die();
