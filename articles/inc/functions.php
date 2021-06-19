<?php

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
