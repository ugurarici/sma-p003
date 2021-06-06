<?php

//  PHP'de elimizdek iverileri JSON formatına çevirmek ve JSON formatından tekrar PHP verisine çevirmek hayli kolaydır
//  bunun için json_encode() ve json_decode() fonksiyonlarını kullanırız

$students = [
    "Ahmet Falancı",
    "Mehmet Yalancı",
    "Niye Öyle Dedin Lan Hancı",
    "Bana Şarap ve Kadın Getir",
    "Başka bir öğrenci",
    "Bambaşka birisi",
    "Bunu ben hiç tanımıyorum",
    "Bunun dayısı mafya diyorlar",
    "Burası bambaşka he",
];

//  elimizdeki veriyi JSON formatına çevirelim
$studentsJsonToWrite = json_encode($students);

//  bunu bir dosyaya kaydedelim
file_put_contents('students.json', $studentsJsonToWrite);
//  bu şekilde JSON olarak kaydettikten sonra, veri kaynağımızı istediğimiz zaman bu dosyadan okuyup tekrar dizi halinde kullanabiliriz