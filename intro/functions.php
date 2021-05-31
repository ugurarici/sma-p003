<?php

// PHP'de fonksiyonlar
function hello()
{
    // echo "Hello World!";
    return "Hello World!";
}

// hello();
echo hello();

$name = "Uğur";

$name;

echo "<hr>";

function helloDear($name)
{
    echo "Hello $name!";
}

helloDear("Uğur");

echo "<hr>";

function kisiKarti($name, $age = null, $gender = null)
{
    echo "Hello $name<br>";
    if ($age != null) echo "Age $age<br>";
    if ($gender != null) echo "Gender $gender<br>";
    echo "<hr>";
}

kisiKarti("Uğur", 28, "E");
kisiKarti("Gülistan", 19, "K");
kisiKarti("Mahmut");
kisiKarti("Deniz", 12);
kisiKarti("Süreyya", null, "K");
