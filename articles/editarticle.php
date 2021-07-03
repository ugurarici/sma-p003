<?php
require "inc/init.php";

redirectIfNotLoggedIn();

$article = Article::find($_GET['id']);

if (!$article) {
    header("Location: index.php");
    die();
}

//  eskiden updatearticle.php içinde bulunan kodları buraya alıyoruz
//  böylece düzenleme işlemi aşamaları olan form gösterme ve düzenlemeleri kaydetme işlemlerini tek dosyada topluyoruz
//  aynı işlemi newarticle.php için de yapmıştık
if (isset($_POST['id']) and isset($_POST['title']) and isset($_POST['content'])) {

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->save();

    //  burada işimiz bitti, güncellenen article detayına gidelim
    header("Location: detail.php?id=" . $article->id);
    die();
}

include "views/editarticle.php";
