<?php

if (!function_exists('array_key_last')) {
    //   array_last_key PHP 7.3 ve üstünde bulunduğu için, daha alt sürümler için alttaki 2 satır kullanılarak son dizi elemanının indisine erişilebilir
    function array_key_last($array)
    {
        end($array);
        return key($array);
    }
}

function redirectIfNotLoggedIn($page = "login.php")
{
    if (!isset($_SESSION['username'])) {
        header("Location: " . $page);
        die();
    }
}

function redirectIfLoggedIn($page = "index.php")
{
    if (isset($_SESSION['username'])) {
        header("Location: " . $page);
        die();
    }
}
