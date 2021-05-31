<?php

// echo "Hello world";

$name = "Mehmet Uğur Arıcı";
$age = 28;
$height = 1.7;
$isInstructor = true;
$hobbies = array("konuşmak", "yemek yemek");
$hobbies = ["konuşmak", "koşmak"];
// $hobbies = true; PHP'de değişken üstüne farklı bir tipte değer ataması yapılabilir
$yokki = null;

// echo $hobbies[1];

// $1numaraliogrenci = "OLMAZ";

$Name = "Başka isim";

$hobbies[1] = "düşünmek";

// echo $hobbies[1];

$person = [
    "name" => $name,
    "age" => $age,
    "height" => $height,
    "isInstructor" => $isInstructor,
    "hobbies" => $hobbies,
];

// echo $person["name"];

$name = "Uğur Arıcı";

// echo $person["name"];

// echo $person["hobbies"][1];

$people = [
    [
        "name" => $name,
        "age" => $age,
        "height" => $height,
        "isInstructor" => $isInstructor,
        "hobbies" => $hobbies,
    ],
    [
        "name" => "Yunus Emre Altanay",
        "age" => 14,
        "height" => 1.8,
        "isInstructor" => false,
        "hobbies" => [
            "yazmak",
            "çizmek",
        ],
    ],
    [
        "name" => "Nilin Börekçi",
        "age" => 21,
        "height" => 1.5,
        "isInstructor" => false,
        "hobbies" => [
            "okumak",
            "izlemek",
        ],
    ],
    [
        "name" => "Furkan Meraloğlu",
        "age" => 18,
        "height" => 1.9,
        "isInstructor" => true,
        "hobbies" => [
            "uyumak",
            "okumak",
            "yüzmek",
        ],
    ],
];

// echo gettype($people);
// var_dump($people);

if ($age >= 18) {
    echo "En tepede yaşı verilen kişi kimse reşitmiş, öde ulen vergini!!!";
} elseif ($age < 18 && $age >= 5) {
    echo "Tüh bu daha reşit değilmiş, neyse bilgisayarına, oyuncağına, konsoluna vergi koyarız. Bunun reşit olmasına da daha " . (18 - $age) . " yıl varmış";
} else {
    echo "Bu daha bebe be, neyse anasından babasından alırız, bezine mamasına vergi koyarız. Bunun reşit olmasına da daha " . (18 - $age) . " yıl varmış";
}

echo "<hr>";

echo "Yaşı: $age";

echo "<hr>";


foreach ($people as $key => $value) {

    if ($value["name"] == "Yunus Emre Altanay") continue;
    if ($key == 3) break;

    echo ($key + 1) . ". sırada " . $value["name"] . " isimli, " . $value["age"] . " yaşında ve " . ($value['height'] * 100) . "cm boyunda birisi var. ";


    if ($value["age"] < 18) {

        echo "Gördüğünüz gibi kendisi henüz reşit değil. ";

        if ($value["height"] >= 1.75) {
            echo "Ama boydan kurtarır, içki almaya onu yollayalım. ";
        } else {
            echo "İçki almaya başkasını yollayalım. ";
        }
    }

    echo "Kendisinin " . count($value['hobbies']) . " adet hobisi varmış. <br>";
}

echo "<hr>";

$f = 0;

for ($i = 0; $i < 5; $i++) {
    echo $i;
}

echo $i;


echo "<hr>";

$meyveler = ["elma", "armut", "çilek", "karpuz"];

$meyve = "muz";

echo $meyve;

echo "<hr>";

foreach ($meyveler as $meyve) {
    echo $meyve . "<br>";
}

echo "<hr>";

echo $meyve; // karpuz

echo "<hr>";
echo "<hr>";

$indis = 0;
while ($indis <= 3) {
    echo $meyveler[$indis] . "<br>";
    $indis++;
}

echo "<hr>";
echo "<hr>";

do {
    $zar = rand(1, 6);
    echo "Zar atıldı $zar geldi<br>";
} while ($zar != 5);
