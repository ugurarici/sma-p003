<?php
require "inc/init.php";

redirectIfNotLoggedIn();

//  eskiden updatearticle.php içinde bulunan kodları buraya alıyoruz
//  böylece düzenleme işlemi aşamaları olan form gösterme ve düzenlemeleri kaydetme işlemlerini tek dosyada topluyoruz
//  aynı işlemi newarticle.php için de yapmıştık
if (isset($_POST['id']) and isset($_POST['title']) and isset($_POST['content'])) {
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
}


if (!isset($_GET['id']) || !isset($articles[$_GET['id']])) {
    header("Location: index.php");
    die();
}

$articleId = $_GET["id"];

$article = $articles[$articleId];

include "views/editarticle.php";
