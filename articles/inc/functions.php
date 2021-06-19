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

function handleArticleId()
{
    $articles = getAllArticles();

    if (!isset($_REQUEST['id']) || !isset($articles[$_REQUEST['id']])) {
        header("Location: index.php");
        die();
    }

    return $_REQUEST["id"];
}

function getAllArticles()
{
    $articlesJson = file_get_contents('articles.json');
    return json_decode($articlesJson, true);
}

function getArticleDetail($id)
{
    $articles = getAllArticles();
    return $articles[$id];
}

function createNewArticle($title, $content)
{
    $articles = getAllArticles();

    //  articles dizisine yeni bir eleman ekliyoruz
    $articles[] = [
        "title" => $title,
        "content" => $content
    ];

    //  articles dizisinin yeni halini JSON'a çeviriyoruz
    $articlesJson = json_encode($articles);

    //  JSON'ın yeni halini dosyaya yazıyoruz
    file_put_contents('articles.json', $articlesJson);

    //  son article elemanının indisini alalım
    return array_key_last($articles);
}

function editArticle($id, $newTitle, $newContent)
{
    $articles = getAllArticles();

    //  articles dizisindeki bir elemanı güncelliyoruz
    $articles[$id] = [
        "title" => $newTitle,
        "content" => $newContent
    ];

    //  articles dizisinin yeni halini JSON'a çeviriyoruz
    $articlesJson = json_encode($articles);

    //  JSON'ın yeni halini dosyaya yazıyoruz
    return file_put_contents('articles.json', $articlesJson);
}

function deleteArticle($id)
{
    $articles = getAllArticles();

    //  articles dizisinden istenen elemanı sileceğiz
    unset($articles[$id]);

    //  articles dizisinin yeni halini JSON'a çeviriyoruz
    $articlesJson = json_encode($articles);

    //  JSON'ın yeni halini dosyaya yazıyoruz
    return file_put_contents('articles.json', $articlesJson);
}

function getRandomArticleId()
{
    $articles = getAllArticles();
    return array_rand($articles);
}
