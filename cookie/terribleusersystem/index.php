<?php

//  HTTP'nin stateless yapısına rağmen Cookie içinde saklanan verilerle kullanıcın tercihleri ya da sitede yapmış olduğu işlemlerin sonucunu sonraki taleplerinde de bize ileterek süregelen işlemler yapabileceğimizi gördük

//  O halde, şimdiye kadar herhangi bir kullanıcı kontrolü işlemi yapmadan, siteye erişen herkesin görebileceği şekilde geliştirdiğimiz kimi işlemleri, bir yetki duvarının arkasına koymak için de, kullanıcının kim olduğunu anlamamızı sağlayacak bir yönde kullanabilmek için Cookie'den faydalanabiliriz

//  Bu örnek, dosya adından da anlaşılabileceği gibi BERBAT bir kullanıcı yetki işlemi örneği olması için yazıldı. ASLA kullanıcı işlemleri yalnızca Cookie üzerinde taşınan verilerle YAPILMAMALI!
?>


<?php if (isset($_COOKIE['warning'])) : ?>
    <p style="background-color: yellow;">
        <?= $_COOKIE['warning'] ?>
    </p>
<?php endif; ?>


<?php if (!isset($_COOKIE['username'])) : ?>

    <form action="login.php" method="post">
        Kullanıcı Adı: <input type="text" name="username"><br>
        PAROLA: <input type="password" name="password"><br>
        <button type="submit">Giriş</button>
    </form>

<?php elseif (isset($_COOKIE['username'])) : ?>
    <p>
        OOOO kullanıcı gelmiş! Hoşgeldiniz sayın <?= $_COOKIE['username'] ?>
    </p>
    <?php
    //  kullanıcı adı ve parola doğrulamasından geçmese bile, gönderdiği HTTP talebindeki
    //  Cookie headerına bir username ve is_admin değeri giren herkes, bu işlemleri görecektir
    //  Yani kontrole tabi tuttuğumuz hassas verileri ASLA Cookie içinde barındırmamalıyız
    if (isset($_COOKIE['is_admin'])) :
    ?>
        <p>
            Abicim sen buraların kralısın. İstediğini yapabilirsin.
        </p>
        <button type="button">Dünyayı yoket</button>
        <button type="button">Vergileri Arttır</button>
        <button type="button">Vergileri Tahsil Et</button>
        <button type="button">Tivitlere Gözat</button>
    <?php endif; ?>
<?php endif; ?>