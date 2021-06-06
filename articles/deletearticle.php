<?php
//  uygulamanın mevcut verisine erişimimiz olmalı
require "data.php";

//  articles dizisinden istenen elemanı sileceğiz
$articleIndexToDelete = $_GET['id'];
unset($articles[$articleIndexToDelete]);

//  aradan bir index kaybolduğu için diziyi reindex işlemine sokuyoruz
$articles = array_values($articles);

//  articles dizisinin yeni halini JSON'a çeviriyoruz
$articlesJson = json_encode($articles);

//  JSON'ın yeni halini dosyaya yazıyoruz
file_put_contents('articles.json', $articlesJson);

//  burada işimiz bitti, son aritcle detayına gidelim
header("Location: index.php");
