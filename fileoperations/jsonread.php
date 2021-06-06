<?php

//  Şimdi de gerektiğinde bu dosyadan veriyi okuyup tekrar kullanmayı görelim
$studentsJson = file_get_contents('students.json');

//  JSON olarak okuduğumuz metni, tekrar PHP değişkenine çevirelim
$students = json_decode($studentsJson);

var_dump($students);
