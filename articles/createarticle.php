<?php
//  uygulamanın mevcut verisine erişimimiz olmalı
require "data.php";

//  articles dizisine yeni bir eleman ekliyoruz
$articles[] = [
    "title" => $_POST['title'],
    "content" => $_POST['content']
];

//  articles dizisinin yeni halini JSON'a çeviriyoruz
$articlesJson = json_encode($articles);

//  JSON'ın yeni halini dosyaya yazıyoruz
file_put_contents('articles.json', $articlesJson);

//  son article elemanının indisini alalım
// $lastArticleId = count($articles) - 1;

if (function_exists('array_key_last')) {
    $lastArticleId = array_key_last($articles);
} else {
    //   array_last_key PHP 7.3 ve üstünde bulunduğu için, daha alt sürümler için alttaki 2 satır kullanılarak son dizi elemanının indisine erişilebilir
    end($articles);
    $lastArticleId = key($articles);
}

//  burada işimiz bitti, son aritcle detayına gidelim
header("Location: detail.php?id=" . $lastArticleId);
