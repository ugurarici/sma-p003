<?php

//  bu sayfaya bir form üzerinden students ve notes dizileri geliyor
//  ikisi bağımsız diziler olmakla birlikte, aynı indise sahip elemanların ilişkisi var
//  yani students dizisinin 0 indisli elemanı öğrencinin adını, notes dizisinin 0 indisli elemanı o öğrencinin notunu içeriyor

//  bunları ilişkili şekilde göstermek istiyoruz
//  nota göre büyükten küçüğe listelemek istiyoruz
//  PHP'de listeleme fonksiyonları için resmi belgesi referans alınabilir: https://www.php.net/manual/tr/array.sorting.php

var_dump($_POST['notes']);

arsort($_POST['notes']);

var_dump($_POST['notes']);

?>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Öğrenci Adı</th>
            <th>Notu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_POST['notes'] as $key => $value) : ?>
            <tr>
                <td><?= $_POST['students'][$key] ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>