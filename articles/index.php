<?php
//   bir dosyanın bağımlı olduğu diğer php dosyalarını yorumlamaya dahil etmek için require kullanıyoruz, bu dosya bulunmazsa sayfa fatal error vererek çalışmayı durduracaktır
require "data.php";

//  bir dosyanın içine çekmek istediğimiz ancak bulunamazsa da sayfanın çalışmasını engellemeyecek dosyaları include ile çekebiliriz, include ile çekmeye çalıştığımız dosyaya erişilemezse sayfanın çalışmasını durduracak bir fatal error değil, yalnızca uyarı basılır ve kalan kısım yorumlanmaya devam eder

$mainColor = "black";
$mainBackGroundColor = "white";
$selectedArticleTitle = $articles[0]['title'];

include "theme.php";

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Articles</title>
</head>

<body style="color:<?= $mainColor ?>; background-color:<?= $mainBackGroundColor ?>;">
    <div class="container">
        <?= $selectedArticleTitle ?>
        <div class="row">
            <div class="col-12 my-2">
                <div class="list-group">
                    <?php foreach ($articles as $key => $item) : ?>
                        <a href="detail.php?id=<?php echo $key ?>" class="list-group-item list-group-item-action">
                            <?php echo $item['title'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>