<?php

//  basit bir kullanıcı giriş/çıkış işlemi yapalım

//  eğer giriş yapmış bir kullanıcı varsa adı ve ÇIKIŞ düğmesi gözüksün
//  yoksa, giriş formu gözüksün
session_start();
?>
<?php if (isset($_SESSION['user'])) : ?>
    Hoşgeldin; <?= $_SESSION['user'] ?> | <a href="logout.php">Çıkış Yap</a>

    <?php if ($_SESSION['is_admin']) : ?>
        <hr>
        Siz burada yetkilisiniz, yönetim yapabilirsiniz. İçerik ekleme/silme/düzenleme yetkileriniz bulunuyor.
    <?php endif; ?>

<?php else : ?>
    <form action="login.php" method="post">
        Kullanıcı Adı: <input type="text" name="username"><br>
        PAROLA: <input type="password" name="password"><br>
        <button type="submit">Giriş</button>
    </form>
<?php endif; ?>