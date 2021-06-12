<?php

//  sonuç verimizi indislerde öğrenci adı içeriklerde de ilgili öğrencinin notu olacak şekilde oluşturalım
// $examResult = [
//     "Uğur" => 50,
//     "Mehmet" => 62,
//     "Ahmet" => 21,
// ];

foreach ($_POST['students'] as $key => $value) {
    $examResult[$value] = $_POST['notes'][$key];
}

file_put_contents("result.json", json_encode($examResult));

header("Location: result.php");
die();
//  eğer düz PHP içinde header ile yönlendirme tetiklemesi ekliyorsak
//  yani yönlendirme ataması sonrasındaki kodun çalışmasını istemiyorsak
//  mutlaka exit; ya da die(); ile php yorumlayıcıyı durdurmalıyız