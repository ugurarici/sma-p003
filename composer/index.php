<?php

//  composer aracılığı ile bir projenin bağımlılıklarını tanımlayıp rahatlıkla projemize indirilmesini
//  ve ihtiyaç duyduğumuzda kullanımımıza sunulmasını sağlayabiliriz

//  bu klasörün içinde bulunan composer.json dosyası, projenin temel tanımlarını, en önemlisi de bağımlılıklarını içerir
//  projeyi ilk haliyle alan kişi öncelikle bu dizin içinde `composer install` komutunu çalıştırarak bağımlılıklarını kurması gerekir
//  composer.lock dosyası, composer.json dosyasındaki bağımlılıklara göre yapılan kurulumdaki TAM sürüm numaralarını da içerir, projeyi birebir aynı şekilde çalıştırmak isteyen kişilerin tekrar kurması durumunda böylelikle aynı sürümün kullanılması sağlanır

//  `composer update` komutu ise, projenin bağımlı olduğu paketlerin güncel kullanılabilir sürümlerine güncellenmesini, lock dosyasının da buna göre değiştirilmesini sağlar

//  composer ile bağımlılık kurulumunu yaptığımızda, `/vendor` dizini içine gerekli dosyalar oluşturulur
//  bizim buradan tek tek dosyalara erişmemize gerek yoktur, `/vendor/autoload.php` dosyası, ihtiyaç duyduğumuz sınıfı çağırdığımızda bizim için otomatik yüklenmesini sağlar

//  yani her şeyden önce composer ile gelen autoloader dosyasını çekmemiz gerekiyor

require_once "vendor/autoload.php";

use Doctrine\Inflector\InflectorFactory;
use Doctrine\Inflector\Language;

$inflector = InflectorFactory::create()->build();

var_dump($inflector->pluralize('browser')); // browsers

var_dump($inflector->pluralize('child')); // children

var_dump($inflector->pluralize('person')); // people


$inflectorTR = InflectorFactory::createForLanguage(Language::TURKISH)->build();

var_dump($inflectorTR->pluralize('elma')); // elmalar

var_dump($inflectorTR->pluralize('uğur')); // uğurlar

var_dump($inflectorTR->pluralize('iki kelime')); // iki kelimeler
