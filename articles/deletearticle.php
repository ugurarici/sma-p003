<?php
//  uygulamanın mevcut verisine erişimimiz olmalı
require "inc/init.php";

redirectIfNotLoggedIn();

$articleIndexToDelete = handleArticleId();
deleteArticle($articleIndexToDelete);

//  burada işimiz bitti, ana sayfaya gidelim
header("Location: index.php");
die();
