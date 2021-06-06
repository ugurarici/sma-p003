<?php
//  elimizdeki makalelerden rastgele bir tanesini seçip onun detayına yönlendirme yapmalıyız

//  öncelikle makalelere erişimimiz olmalı
require_once "data.php";

//  rastgele bir değer seçmek için rand fonksiyonunu kullanalım
$randomArticleId = rand(0, count($articles) - 1);

//  rastgele seçilen id detayına yönlendirme yapalım
header("Location: detail.php?id=" . $randomArticleId);
