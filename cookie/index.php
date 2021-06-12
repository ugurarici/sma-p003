<?php

//  PHP ile, HTTP aracılığı ile gönderilip alınan Cookie yönetimini de rahatlıkla sağlayabiliriz
//  Cookie, HTTP standartlarının bir parçasıdır: https://developer.mozilla.org/en-US/docs/Web/HTTP/Cookies
//  Dilerseniz Postman gibi herhangi bir HTTP istemcisi ile, PHP'den bağımsız, Cookie testleri yapabilirsiniz: Cookies

//  PHP ile de, istemcinin yolladığı HTTP Headers içindeki Cookie'lere erişmek ve dilediğimiz Cookie atamasını (Set-Cookie Header'ı ile) HTTP Yanıtına ekleyip göndermek mümkündür

//  PHP ile, HTTP yanıtı içinde gelen Cookie değerlerine erişmek

// $_COOKIE süper değişkeni ile HTTP ile gelen Cookie verilerine erişmek mümkündür
//  https://www.php.net/manual/en/reserved.variables.cookies

echo $_COOKIE['name'];

//  PHP ile Cookie ataması yapabilmek için setcookie('cerez_adi', 'cerez_degeri', $gecerlilikZamani) şeklinde atama yapılabilir, geçerlilik zamanı verilmeyerek tarayıcıdan temizlenmediği sürece tarayıcıda kalması sağlanabilir. Sitelerin giriş formlarındaki "Beni Hatırla" özelliği böyle çalışır
//  https://php.net/setcookie

setcookie('name', 'Uğur', time() + 60);

//  setcookie ile atanan cookie değerleri, doğrudan $_COOKIE dizisi üzerine yazılmaz. Bu fonksiyon yalnızca gönderilecek HTTP yanıtının içine Set-Cookie header değerinin eklenmesini sağlar. $_COOKIE değişkeni ise yalnızca gelen talep içindeki Cookie headerının değerlerini taşır. Yani setcookie ile atanan değer en az 1 kere tarayıcıya gidip, tarayıcı aracılığıyla talebin içinde geri gelmediği sürece doğrudan $_COOKIE üzerinden okunamaz

echo $_COOKIE['name']; // ilk çalıştırmada buna erişemeyiz yani
