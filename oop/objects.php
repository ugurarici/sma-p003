<?php

$studentArray = [
    'name' => 'Uğur',
    'surname' => 'Arıcı',
    'class' => 'P003'
];

var_dump($studentArray);

$studentObject = (object)$studentArray;

var_dump($studentObject);

var_dump($studentArray['name']);

var_dump($studentObject->name);


$studentObject2 = new stdClass;
$studentObject2->name = "Yunus Emre";
$studentObject2->surname = "Altanay";
$studentObject2->class = "P003";

var_dump($studentObject2);

class Student
{
    public $name;
    public $surname;
    public $class;

    public function sayHi()
    {
        return "Hi! My name is " . $this->getFullName();
    }

    private function getFullName()
    {
        return $this->name . " " . $this->surname;
    }
}

$studentFromClass = new Student;
$studentFromClass->name = "Nilin";
$studentFromClass->surname = "Börekçi";
$studentFromClass->class = "P003";


var_dump($studentFromClass);

echo $studentFromClass->sayHi();
// echo $studentFromClass->getFullName();


//  

class Article
{
    public $id;
    public $title;
    public $content;

    protected $dbcon;

    public function __construct()
    {
        $this->dbcon = new PDO('mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4', 'root', 'root');
    }

    public function save()
    {
        if ($this->id == null) {
            $this->insertNew();
        } else {
            $this->update();
        }
    }

    private function insertNew()
    {
        $insertArticleQueryBase = $this->dbcon->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");

        $insertResult = $insertArticleQueryBase->execute([
            $this->title,
            $this->content
        ]);

        $this->id = $this->dbcon->lastInsertId();
    }

    private function update()
    {
        $updateArticleQueryBase = $this->dbcon->prepare("UPDATE articles SET title=:title, content=:content WHERE id = :id");

        $updateResult = $updateArticleQueryBase->execute([
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }

    public function populateFromDatabase()
    {
        $readFromDB = $this->dbcon->query("SELECT * FROM articles WHERE id = " . (int)$this->id)->fetch(PDO::FETCH_OBJ);
        $this->title = $readFromDB->title;
        $this->content = $readFromDB->content;
    }

    public static function find($id)
    {
        $aNewArticle = new Article;
        $aNewArticle->id = $id;
        $aNewArticle->populateFromDatabase();
        return $aNewArticle;
    }
}


$article = new Article;
$article->title = "Başlık";
$article->content = "İçerik";

var_dump($article);

$article->save();

var_dump($article);

$article->title = "Ay başlık yanlış olmuş şekerim";

$article->save();

var_dump($article);

$connection = new PDO('mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4', 'root', 'root');

$articles = $connection
    ->query('SELECT * FROM articles')
    ->fetchAll(PDO::FETCH_CLASS, Article::class);

var_dump($articles);

foreach ($articles as $article) {
    $article->title = $article->id . " " . $article->title;
    $article->save();
}

var_dump($articles);

//

$article = Article::find(12);
$article->title = "Bunu find ile çekmiştik";
$article->save();

var_dump($article);
