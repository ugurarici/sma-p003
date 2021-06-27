<?php

//  bu dosyada kullanıcıdan form aracılığıyla veri alıp düzenleme yapacağız

require_once "database.php";

//  form ile gelen veri varsa onu işleme koyalım
if (isset($_POST['id']) and isset($_POST['title']) and isset($_POST['content'])) {
    $insertQueryBase = $db->prepare("UPDATE articles SET title=:title, content=:content WHERE id=:id");

    $insertAction = $insertQueryBase->execute([
        'id' => (int)$_POST['id'],
        'title' => $_POST['title'],
        'content' => $_POST['content'],
    ]);

    header("Location: detail.php?id=" . (int)$_POST['id']);
    die();
}

$article = $db
    ->query("SELECT * FROM articles WHERE id = " . (int)$_GET['id'])
    ->fetch(PDO::FETCH_ASSOC);

?>

<form method="post">
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    Başlık: <input type="text" name="title" value="<?= $article['title'] ?>"><br>
    İçerik:<br>
    <textarea name="content"><?= $article['content'] ?></textarea><br>
    <button type="submit">Düzenle</button>
    <br>
    <a href="index.php">Vazgeç</a>
</form>