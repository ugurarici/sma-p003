<?php

//  kullanıcı adını alıp gösterelim

if (isset($_COOKIE['name'])) {
    echo "Çerezlerden gelen `name` değeri: " . $_COOKIE['name'];
} else {
    echo "Çerezlerden  gelen bir `name` değeri yok.";
}

?>
<hr>
<form action="setcookie.php">
    <input type="text" name="isim">
    <button type="submit">Güncelle</button>
</form>