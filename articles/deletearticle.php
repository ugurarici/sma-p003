<?php
//  uygulamanın mevcut verisine erişimimiz olmalı
require "init.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}

//  articles dizisinden istenen elemanı sileceğiz
$articleIndexToDelete = $_GET['id'];
unset($articles[$articleIndexToDelete]);

//  articles dizisinin yeni halini JSON'a çeviriyoruz
$articlesJson = json_encode($articles);

//  JSON'ın yeni halini dosyaya yazıyoruz
file_put_contents('articles.json', $articlesJson);

//  burada işimiz bitti, son aritcle detayına gidelim
header("Location: index.php");
