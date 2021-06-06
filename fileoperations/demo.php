<?php

//  php'de dosyaların içeriklerini okumak ve gerektiğinde dosyalara içerik yazmak için yöntemlerimiz bulunuyor
//  dosya işlemlerindeki en kritik nokta, işlem yapacağımız dosyalar ve/veya bulunduklaru/bulunacakları dizinler üzerinde, php yorumlayıcısını çalıştıran kullanıcıya dönük doğru dosya izinlerinin bulunduğundan emin olmaktır
//  Linux üzerinde dosya işlemlerine bir anlatım için örnek: https://www.guru99.com/file-permissions.html

//  yolunu belirttiğimiz bir dosyanın içeriğini okuyup bir değişkene atamak için file_get_contents kullanabiliriz
$studentsFileContent = file_get_contents('students.txt');

// echo "YANKII";

echo "<pre>";
echo $studentsFileContent;
echo "</pre>";

////////

//  elimizdeki (php tarafında) bir veriyi/içeriği de file_put_contents ile bir dosyaya yazabiliriz

$newStudents = "\nBurası bambaşka he";

file_put_contents('students.txt', $newStudents);

//  eğer mevcut içeriğin üzerine eklemek istersek de üçüncü paremetre olarak FILE_APPEND sabitini yollayabiliriz
file_put_contents('students.txt', $newStudents, FILE_APPEND);
