<?php

//  Dependency Injection - Bağımlılık Sızdırma

//  Nesne yönelimli programlamada her işi ve/veya iş grubunu üstlenen, ilgili sınıftan türetilmiş obje vardır
//  Örneğin PHP'de veritabanı işlemleri için PDO sınıfından türettiğimiz objeleri kullanırız

//  Uygulamanın başkaca parçaları doğal olarak diğer sınıflardan türetilmiş MEVCUT objelere ihtiyaç duyabilir
//  Örneğin; birden fazla sınıf tanımı içerisinde, o sınıfın objeleri için veritabanı işlemi gerekebilir
//      yani, bir obje kendi işini yapabilmek için, bir başka objenin yeteneklerine BAĞIMLIDIR

//  Tabii ki diğer objenin (Örn: PDO) yetenekleri için, buna bağımlı olarak çalışan objenin sınıfında (Örn: ArticleModel)
//      bağımlı olunan sınıf tipinden (PDO) yeni bir obje türetilebilir (new PDO)
//  Ancak bunu yaptığımızda, tüm proje genelinde yalnızca 1 adet PDO bağlantısı ile çözülebilecek ihtiyacımıza rağmen
//      PDO dışında türetilen tüm sınıfların içinde de birer PDO objesi türemiş olur, rami şişirir, performansı bozar
//      türlü sıkıntılar yaratır, uykusuzluk ve baş ağrısına sebep olabilir, siyatik ağrılarını tetikleyebilir,
//      ilgili tipteki objenin dışa bağımlılığı varsa (Örn: MySQL bağlantısı işgali) bu bağımlılığı suistimal edebilir
//      ya da bağlantı limitlerini zorlayabilir vs

//  İşte bu tip durumlar için, bir objenin işleyişinde dıştan başka bir objeye duyulan BAĞIMLILIKTA,
//      içeride tekrar oluşturmak yerine bağımlılık duyulan işi yapabilen bir objeyi,
//      ihtiyaç duyulan yere SIZDIRIRIZ

//  Sızdırma işlemi temelde ve yaygın olarak, ilgili objenin PARAMETRE olarak yollanmasıdır

/**
 * $a = new A;
 * $b = new B($a);
 *  */

require_once "classes/DBProvider.php";
require_once "classes/API.php";
require_once "classes/A.php";
require_once "classes/B.php";


$pdoFromProvider = DBProvider::getInstance();
$pdoFromProvider->kafamagore = "atadım";

var_dump($pdoFromProvider);

$otherPdoFromProvider = DBProvider::getInstance();
var_dump($otherPdoFromProvider);
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance()->kafamagore);
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());
var_dump(DBProvider::getInstance());


$api = new API("asdasd");

var_dump($api);

// $a = new A("asdasd");

// $mahmut = new PDO("mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4;", "root", "root");

// $a = new A($api, $mahmut);
$a = new A($api);
var_dump($a);
var_dump($a->hey());
var_dump($a->lastArticleId());

// $b = new B($api, $mahmut);
$b = new B($api, $pdoFromProvider);
var_dump($b);
var_dump($b->getData());
var_dump($b->getColumns());
