<?php

if (empty("0")) die("0 imiş");

var_dump($_GET);

foreach ($_GET as $key => $item) {
    if ($item === "") $_GET[$key] = null;
}

var_dump($_GET);

$name = $_GET['name'];
$position = $_GET['position'];

if (is_null($position)) die("Tüm alanlar dolu olmalıdır.");

echo "Merhaba Sn. $name <br> $position için başvurunuz alındı. En yakın zamanda size döneceğiz ama iletişim bilgisi almadık ki nasıl döneceğiz bilmiyorum";
