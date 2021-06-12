<?php
//  uygulamanın mevcut verisine erişimimiz olmalı
require "data.php";

if (!isset($_POST['id']) || !isset($articles[$_POST['id']])) {
    header("Location: index.php");
    die();
}

$articleId = $_POST["id"];

//  articles dizisindeki bir elemanı güncelliyoruz
$articles[$articleId] = [
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

//  articles dizisinin yeni halini JSON'a çeviriyoruz
$articlesJson = json_encode($articles);

//  JSON'ın yeni halini dosyaya yazıyoruz
file_put_contents('articles.json', $articlesJson);

//  burada işimiz bitti, güncellenen article detayına gidelim
header("Location: detail.php?id=" . $articleId);
die();
