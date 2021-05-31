<?php

$config = array(
    "asdf" => "asd",
    "rewq" => "adsf"
);

$name = "Uğur";
$surname = "Arıcı";
$age = 27;
echo $_GET['id'];

function hello($name, $surname = "Yıldız")
{
    global $config;
    // $age;    // çalışmaz çünkü bu scopeta değil
    $config["asdf"]; // çalışır çünkü yukarıda global ile erişim belirttik
    return "id " . $_GET['id'] . " Hello $name " . $surname;
}

$soyadi = $_GET['soyadi'];
echo hello("Mahmut", $soyadi);
echo "<hr>";
echo $name;
echo "<hr>";
echo $surname;
