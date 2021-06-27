<?php

//  adres çubuğundan aldığımız id değerine ait article satırını okuyup burada göstermeliyiz

require_once "database.php";

$id = (int)$_GET['id'];

$article = $db
    ->query("SELECT * FROM articles WHERE id = " . $id)
    ->fetch(PDO::FETCH_ASSOC);

?>

<h1>
    <?= $article['title'] ?>
</h1>
<p>
    <?= $article['content'] ?>
</p>
<hr>
<a href="index.php">Ana sayfa</a>
<a href="edit.php?id=<?= $article['id'] ?>">Düzenle</a>
<a href="delete.php?id=<?= $article['id'] ?>">Sil</a>