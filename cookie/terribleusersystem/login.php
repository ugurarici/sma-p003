<?php

$predefinedUserName = "ugur";
$predefinedPassword = "321";

if ($_POST['username'] == $predefinedUserName && $_POST['password'] == $predefinedPassword) {
    setcookie("username", $predefinedUserName);
    setcookie("is_admin", 1);
} else {
    setcookie("warning", "Az önce denenen gibi bir kullanıcı bulamadık. Güle güle şekerim.", time() + 3);
}

header("Location: index.php");
die();
