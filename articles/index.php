<?php
//   bir dosyanın bağımlı olduğu diğer php dosyalarını yorumlamaya dahil etmek için require kullanıyoruz, bu dosya bulunmazsa sayfa fatal error vererek çalışmayı durduracaktır
require "data.php";

//  bir dosyanın içine çekmek istediğimiz ancak bulunamazsa da sayfanın çalışmasını engellemeyecek dosyaları include ile çekebiliriz, include ile çekmeye çalıştığımız dosyaya erişilemezse sayfanın çalışmasını durduracak bir fatal error değil, yalnızca uyarı basılır ve kalan kısım yorumlanmaya devam eder

$mainColor = "black";
$mainBackGroundColor = "white";
// $selectedArticleTitle = $articles[0]['title'];

include "theme.php";
//  PHP tanımları bitti, görsel kısma başlayalım
?>
<?php
include "header.php";
?>
<div class="container">
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
<?php
include "footer.php";
?>