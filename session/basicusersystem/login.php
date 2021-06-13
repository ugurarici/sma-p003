<?php

session_start();

$authenticableUsers = array(
    [
        "username" => "ugur",
        "password" => "321",
        "is_admin" => true,
    ],
    [
        "username" => "cihat",
        "password" => "135790",
        "is_admin" => false,
    ],
    [
        "username" => "yasin.korkmaz",
        "password" => "12345",
        "is_admin" => false,
    ],
    [
        "username" => "karpuzcugozde",
        "password" => "karpuz",
        "is_admin" => false,
    ]
);

foreach ($authenticableUsers as $key => $value) {
    if ($_POST['username'] == $value['username'] && $_POST['password'] == $value['password']) {
        $_SESSION['user'] = $value['username'];
        $_SESSION['is_admin'] = $value['is_admin'];
        break;
    }
}

header("Location: index.php");
die();
