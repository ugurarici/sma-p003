<?php

//  bu basit örneğimizde PDO kullanarak CRUD işlemlerini yapan bir uygulama yapacağız

//  öncelikle tüm sayfalardan erişebildiğimiz bir PDO objemiz olmalı
//  bu PDO objesi sayesinde, ana sayfada ilgili kayıtların listesi
//  bir adet detay sayfasında seçilen kayıdın detayı
//  yeni kayıtlar eklenmesi için bir yeni kayıt formu
//  detay sayfası üzerinden, bir kaydın düzenlenmesi/silinmesi bağlantıları ve işlemler

// $db = new PDO('mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4;', 'root', 'root');

require_once "database.php";

//  tüm kayıtların listelenmesi

$articles = $db->query("SELECT * FROM articles ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<a href="create.php">Yeni Ekle</a>
<hr>
<ul>
    <?php foreach ($articles as $article) : ?>
        <li>
            <a href="detail.php?id=<?= $article['id'] ?>">
                <?= $article['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>