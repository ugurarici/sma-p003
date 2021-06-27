<?php

//  gönderilen kaydın silinmesini sağlayacağız

require_once "database.php";

$id = (int)$_GET['id'];

$deletedRowsCount = $db->exec("DELETE FROM articles WHERE id = " . $id);

if ($deletedRowsCount == 0) die("Hiçbir şey silemedik, zaten yok muydu acaba böyle bir şey?");

header("Location: index.php");
die();
