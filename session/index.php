<?php

//  PHP'de oturum işlemlerini yönetebilmek için SESSION yeteneklerini kullanabiliriz
//  Session sayesinde, HTTP'nin stateless yapısını kırıp süregelen taleplerde devam eden bir deneyim sunabiliriz
//  Özellikle kullanıcı tanımına bağlı hassas verileri barındırmak için mutlaka Session desteğini kullanmalıyız
//  Detaylı belge: https://php.net/session


//  Bir oturum sürecinin ihtiyaç duyduğu atamaları yapabilmek için PHP'de session_start() fonksiyonunu kullanabiliriz
session_start();

//  Bu fonksiyon, öncelikle gelen talebin içinde bir oturum anahtarı (session_id) var mı diye bakar
//      Eğer gelen talebin içinde oturum anahtarı varsa, sunucu tarafında o anahtarın karşılığı olan bir veri deposu açık mı diye bakar
//      Aktif bir veri deposu varsa ilişki kurulmuş olur, ve o ziyaret esnasında işletilen PHP kodunda, $_SESSION değişkeni üzerinden, ilgili depo içindeki verilere erişilebilir hale gelinir
//  En başta, talebin içinde gelen bir oturum anahtarı (session_id) yok ise, yeni bir oturum deposu ve anahtarı oluşturulup, ilgili anahtar sonraki taleplerde sunucuya gönderilebilmesi için istemciye (Cookie olarak) bildirilir

var_dump($_SESSION);

$_SESSION['name'] = "Uğur";

var_dump($_SESSION);
