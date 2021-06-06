<?php
//  bir dosyanın içinde, dosyanın bağımlı olduğu, ancak daha önce yorumlamaya dahil edildiyse tekrar çekmenin gerekmeyeceği dosyalar için requre ya da include ifadesinin sonuna "bir kerelik" demek için _once ekini koyarız
//  Örneğin; bu kodda data.php içinde tanımlanan $articles dizisine ihtiyacımız var, ancak bu data.php daha önce yorumlamaya dahil edildiyse, burada tekrar dahil edilmesine gerek yok.
//  özellikle içinde fonksyion tanımlaması bulunan kodlarda, aynı isimde bir fonksiyon 2 kere tanımlanamayacağı için, ilgili dosyayı mutlaka _once ile çekmek çok önemlidir
require_once "data.php";

$mainBackGroundColor = "#F0F";
// $selectedArticleTitle = $articles[2]['title'];
