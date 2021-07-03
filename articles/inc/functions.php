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
    if (!isset($_REQUEST['id']) || !isArticleExists($_REQUEST['id'])) {
        header("Location: index.php");
        die();
    }

    return $_REQUEST["id"];
}

function getAllArticles()
{
    global $database;

    return $database->query("SELECT * FROM articles ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
}

function isArticleExists($id)
{
    global $database;

    $getDetailQuery = $database->prepare("SELECT id FROM articles WHERE id = ?");
    $getDetailQuery->execute([$id]);

    return $getDetailQuery->rowCount() > 0;
}

function getArticleDetail($id)
{
    global $database;

    $getDetailQuery = $database->prepare("SELECT * FROM articles WHERE id = ?");
    $getDetailQuery->execute([$id]);

    return $getDetailQuery->fetch(PDO::FETCH_ASSOC);
}

function createNewArticle($title, $content)
{
    global $database;

    $insertQuery = $database->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");

    $insertResult = $insertQuery->execute(
        compact('title', 'content')
    );

    return $database->lastInsertId();
}

function editArticle($id, $title, $content)
{
    global $database;

    $updateQuery = $database->prepare("UPDATE articles SET title=:title, content=:content WHERE id=:id");
    return $updateQuery->execute(compact('id', 'title', 'content'));
}

function deleteArticle($id)
{
    global $database;

    $deleteQuery = $database->prepare("DELETE FROM articles WHERE id=:id");
    return $deleteQuery->execute(compact('id'));
}

function getRandomArticleId()
{
    global $database;

    $getRandId = $database->query("SELECT id FROM articles ORDER BY RAND() LIMIT 1")->fetch(PDO::FETCH_ASSOC);

    return $getRandId['id'];
}
