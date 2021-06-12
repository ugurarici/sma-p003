<?php

setcookie('name', $_GET['isim'], time() + 10);

header("Location: index.php");

die();
