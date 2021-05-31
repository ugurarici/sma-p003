<?php

//  PHP Web programlamayı basitleştirebilmek adına geliştirilen uygulamalar içindeki ihtiyaç duyulabilecek verileri, dilediğimiz alandan erişebilmemiz için super küreseller içine atar.

//  Adres çubuğundan atanan verilerin erişimi $_GET ile yapılır (query string access)
//  https://www.php.net/manual/en/reserved.variables.get.php
echo "<pre>";
var_dump($_GET);
echo "</pre>";

//  HTTP içinde gönderilen POST yükünü yakalayabilmek için de PHP tarafında $_POST süper küreselini kullanırız
//  https://www.php.net/manual/en/reserved.variables.post.php
echo "<pre>";
var_dump($_POST);
echo "</pre>";


//  HTTP talebi içinde gönderilen birçok detay ve sunucu tarafında çalışmakta olan scriptin yolu/ek bilgileri gibi veriler ise $_SERVER süper küreseline atanır
//  https://www.php.net/manual/en/reserved.variables.post.php
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
