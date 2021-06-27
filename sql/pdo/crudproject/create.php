<?php

//  bu dosyada kullanıcıdan form aracılığıyla veri alıp yeni bir kayıt ekleme yapacağız

require_once "database.php";

//  form ile gelen veri varsa onu işleme koyalım
if (isset($_POST['title']) and isset($_POST['content'])) {
    $insertQueryBase = $db->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");

    $insertAction = $insertQueryBase->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content'],
    ]);

    $lastArticleId = $db->lastInsertId();

    header("Location: detail.php?id=" . $lastArticleId);
    die();
}

?>

<form method="post">
    Başlık: <input type="text" name="title"><br>
    İçerik:<br>
    <textarea name="content"></textarea><br>
    <button type="submit">Ekle</button>
    <br>
    <a href="index.php">Vazgeç</a>
</form>