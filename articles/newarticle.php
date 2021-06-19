<?php
require "init.php";

redirectIfNotLoggedIn();

//  eskiden createarticle.php şeklinde başka bir dosyada bulunan ekleme işlemini
//  aynı dosyanın üstüne aldık
//  öncelikle POST üstünden gelen başlık ve içerik var mı diye bakıyoruz,
//  varsa ekleme işlemini yapıp detayına yönlendiriyoruz
//  eğer yoksa zaten bu if bloğu içine girmez ve aşağıdaki form gözükür
//  böylece yeni bir kayıt ekleme işlemine dair ihtiyaçlarımızı tek dosyada toplamış olduk
if (isset($_POST['title']) and isset($_POST['content'])) {

    //  articles dizisine yeni bir eleman ekliyoruz
    $articles[] = [
        "title" => $_POST['title'],
        "content" => $_POST['content']
    ];

    //  articles dizisinin yeni halini JSON'a çeviriyoruz
    $articlesJson = json_encode($articles);

    //  JSON'ın yeni halini dosyaya yazıyoruz
    file_put_contents('articles.json', $articlesJson);

    //  son article elemanının indisini alalım
    // $lastArticleId = count($articles) - 1;

    if (function_exists('array_key_last')) {
        $lastArticleId = array_key_last($articles);
    } else {
        //   array_last_key PHP 7.3 ve üstünde bulunduğu için, daha alt sürümler için alttaki 2 satır kullanılarak son dizi elemanının indisine erişilebilir
        end($articles);
        $lastArticleId = key($articles);
    }

    //  burada işimiz bitti, son aritcle detayına gidelim
    header("Location: detail.php?id=" . $lastArticleId);
}

?>
<?php include "header.php"; ?>
<div class="container">
    <form method="post">
        <div class="mb-3">
            <label for="inpTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="inpTitle" name="title">
        </div>
        <div class="mb-3">
            <label for="txtContent" class="form-label">Content</label>
            <textarea class="form-control" id="txtContent" rows="3" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save New Article</button>
    </form>
</div>
<?php include "footer.php"; ?>