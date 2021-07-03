<?php

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
        if ($this->id == "random") {
            $queryTail = "ORDER BY RAND() LIMIT  1";
        } else {
            $queryTail = "WHERE id = " . (int)$this->id;
        }

        $readFromDB = $this->dbcon->query("SELECT * FROM articles " . $queryTail)->fetch(PDO::FETCH_OBJ);

        if (!$readFromDB) return false;

        $this->id = $readFromDB->id;
        $this->title = $readFromDB->title;
        $this->content = $readFromDB->content;

        return true;
    }

    public static function find($id)
    {
        $aNewArticle = new self;
        $aNewArticle->id = $id;
        if ($aNewArticle->populateFromDatabase())
            return $aNewArticle;

        return false;
    }

    public function getAllFromDB()
    {
        return $this->dbcon
            ->query("SELECT * FROM articles ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function all()
    {
        $articleHelperObj = new self;
        return $articleHelperObj->getAllFromDB();
    }

    public function delete()
    {
        $this->dbcon->exec("DELETE FROM articles WHERE id = " . $this->id);

        $this->id = null;
        $this->title = null;
        $this->content = null;
    }
}
