<?php

//  PHP'de veritabanı işlemleri yapabilme için bir istemci olarak PDO'yu kullanıyoruz
//  PDO, PHP Data Objects'in kısaltması ve SQL destekleyen birden çok veritabanı sunucusu ile
//      iletişime imkan tanıyan bir SINIF
//  Bu sınıftan türetilen NESNE ile, SQL istemci yeteneklerini kullanabiliyoruz

//  Her şeyden önce, PDO sınıfından yeni bir bağlantı objesi yaratmalıyız
//  Bu bağlantıya özel bağlantı bilgileri (veritabanı sunucu tipi, sunucu adresi, sunucu kullanıcı adı ve parolası gibi)
//      verilerek uygun ayarlarla objenin yaratılmasını sağlarız

// $connection = new PDO('mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4', 'root', 'root');

// $query = $connection->query('SELECT * FROM articles');

//  sorgumuzu bağlantı üzerinden attık ancak doğrudan bu değişkenden veri okumamız mümkün değildir
//  PHP seviyesinde, bu işlemin yanıtı bir PDOStatement yani PDO ifadesi olarak geçer ve sonucunda dönen yanıtın
//      içinde bulunan satırları oradan ALMAMIZ gerekir. Sorgu yanıtındaki satırı ALIP, PHP tarafında bir değişken
//      olmasını sağlarız. Bunun için ilgili ifade üzerinde her bir satır için ->fetch()
//      ya da tamamını tek seferde alabilmek için ->fetchAll() metodlarını kullanırız.

// $firstRow = $query->fetch();
// $secondRow = $query->fetch();

//  yanıtın içinden aldıkça azalır ve bittiğinde false döner
//  bu yüzden bazı geliştiriciler tüm satırları işleme sokmak için while döngüsü kullanır

// while ($line = $query->fetch()) {
//     echo $line['id'] . "<br>";
// }

$connection = new PDO('mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4', 'root', 'root');

$articles = $connection
    ->query('SELECT * FROM articles')
    ->fetchAll(PDO::FETCH_ASSOC);

var_dump($articles);

foreach ($articles as $article) {
    echo $article['id'] . "<br>";
}

//  silme işlemleri sonucunda bir yanıt almayız
//  yani sadece etkilenen satır sayısını okumamız gerekir
//  PDO'da bunun için ->exec() metodunu kullanabiliriz

$deletedRowCount = $connection->exec('DELETE FROM articles WHERE id=5');
var_dump($deletedRowCount);

//  kullanıcıdan alınan veri, sorguya doğrudan dahil edilirse ciddi güvenlik açıklarına sebep olabilir

// $id = $_GET['id']; // 3 -> SELECT * FROM articles WHERE id = 3
// 3; TRUNCATE articles; -> SELECT * FROM articles WHERE id = 3; TRUNCATE articles;
// https://en.wikipedia.org/wiki/SQL_injection
// $hop = $connection->query("SELECT * FROM articles WHERE id = " . $id)->fetchAll(PDO::FETCH_ASSOC);
// var_dump($hop);


//  PDO'da dışarıdan (kullanıcıdan) alınan verilerin, SQL güvenlik açığına sebep olmadan sorguya dahil edilmesi için bir yöntemimiz var
//  Öncelikle sorgunun zemini ve alacağı değişkenler için sorgunun yapısını HAZIRLARIZ (prepare)
//  ardından yapısı hazırlanmış bu sorguya, dışarıdan gelecek değişkenleri bağlayarak ÇALIŞTIRIRIZ

//  öncelikle prepare metodu ile sorgumuzu hazırlayıp, dışarıdan veri gelecek yerlere soru işareti koyuyoruz
$insertArticleQueryBase = $connection->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");

//  ardından hazırlanmış bu sorguyu ->execute() ile çalıştırırken, soru işaretleri ile yerleri belirlenmiş alanlara gelecek değerleri dizi içinde sırayla gönderiyoruz

$title = 'başlık';
$content = "içerik'); TRUNCATE articles;(";

$insertResult = $insertArticleQueryBase->execute([
    $title,
    $content
]);

var_dump($insertResult);
