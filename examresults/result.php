<?php

//  bu sayfaya bir json dosyası üzerinden students ve notes dizileri geliyor
//  ikisi bağımsız diziler olmakla birlikte, aynı indise sahip elemanların ilişkisi var
//  yani students dizisinin 0 indisli elemanı öğrencinin adını, notes dizisinin 0 indisli elemanı o öğrencinin notunu içeriyor

//  bunları ilişkili şekilde göstermek istiyoruz
//  nota göre büyükten küçüğe listelemek istiyoruz
//  PHP'de listeleme fonksiyonları için resmi belgesi referans alınabilir: https://www.php.net/manual/tr/array.sorting.php

// foreach ($_POST['students'] as $key => $value) {
//     $examResult[$value] = $_POST['notes'][$key];
// }
require "functions.php";

$examResult = getResultData();

$orderBy = "";
if (isset($_GET['order'])) $orderBy = $_GET['order'];

switch ($orderBy) {
    case 'note-asc':
        //  aynı şekilde notlar için ancak küçükten büyüğe sıralamak için
        //  dizinin elemanlarına göre küçükten büyüğe sıralamayı sort() sağlar
        //  ancak yine indisleri yitirmek istemediğimiz için asort() ile sıralarıs
        asort($examResult);
        break;
    case 'note-desc':
        //  nota göre en yüksekten en düşüğe sıralamak istediğimizde
        //  dizinin elemanlarına göre büyükten küçüğe sıralama gerekir, bunu rsort() sağlar
        //  ancak indisleri de yitirmek istemediğimiz için arsort() ile sıralarız
        arsort($examResult);
        break;
    case 'name-asc':
        //  isimlere göre A-Z sıralamak istediğimizde
        //  dizinin indis değerlerine göre sıralama gerekir, bunu da ksort() ile sağlarız
        ksort($examResult);
        break;
    case 'name-desc':
        //  isimlere göre Z-A sıralamak istediğimizde
        //  dizinin indis değerlerine göre tersten sıralama gerekir, bunu da krsort() sağlar
        krsort($examResult);
        break;
}

?>
<a href="?order=note-desc">Nota Göre 9-0</a>
<a href="?order=note-asc">Nota Göre 0-9</a>
<a href="?order=name-asc">İsme Göre A-Z</a>
<a href="?order=name-desc">İsme Göre Z-A</a>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Öğrenci Adı</th>
            <th>Notu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($examResult as $name => $note) : ?>
            <tr>
                <td><?= $name ?></td>
                <td><?= $note ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<hr>
<table border="1" cellpadding="5">
    <tr>
        <th>En Yüksek Not</th>
        <td><?= max($examResult) ?></td>
    </tr>
    <tr>
        <th>En Düşük Not</th>
        <td><?= min($examResult) ?></td>
    </tr>
    <tr>
        <th>Ortalama Not</th>
        <td><?= number_format(avg($examResult), 2) ?></td>
    </tr>
    <tr>
        <th>Standart Sapma</th>
        <td><?= standartDeviation($examResult) ?></td>
    </tr>
</table>