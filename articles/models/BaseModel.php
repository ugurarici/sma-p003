<?php

abstract class BaseModel
{
    protected $columns;
    protected $dbcon;

    public function __construct()
    {
        foreach ($this->getColumns() as $column) {
            if (!isset($this->$column))
                $this->$column = null;
        }
        $this->dbcon = new PDO('mysql:host=localhost;dbname=sma_p003_hello;charset=utf8mb4', 'root', 'root');
    }

    public function setColumns($cols)
    {
        $this->columns = $cols;
    }

    public function getTableName()
    {
        if (isset($this->table)) return $this->table;
        return strtolower(static::class) . "s";
    }

    public function getFillableColumns()
    {
        return array_filter($this->getColumns(), function ($item) {
            return $item != "id";
        });
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getFillableArray()
    {
        $array = [];
        foreach ($this->getFillableColumns() as $column) {
            $array[$column] = $this->$column;
        }
        return $array;
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
        $insertArticleQueryBase = $this->dbcon
            ->prepare("INSERT INTO " .
                $this->getTableName() .
                " (" .
                implode(",", $this->getFillableColumns()) .
                ") VALUES (" .
                implode(",", array_map(function ($item) {
                    return ":" . $item;
                }, $this->getFillableColumns())) .
                ")");

        $insertResult = $insertArticleQueryBase->execute($this->getFillableArray());

        $this->id = $this->dbcon->lastInsertId();
    }

    private function update()
    {
        $updateArticleQueryBase = $this->dbcon
            ->prepare("UPDATE " .
                $this->getTableName() .
                " SET " .
                implode(", ", array_map(function ($item) {
                    return $item . "=:" . $item;
                }, $this->getFillableColumns())) .
                " WHERE id = :id");

        $updateResult = $updateArticleQueryBase->execute(
            array_merge(
                [
                    'id' => $this->id,
                ],
                $this->getFillableArray()
            )
        );
    }

    public function populateFromDatabase()
    {
        if ($this->id == "random") {
            $queryTail = "ORDER BY RAND() LIMIT  1";
        } else {
            $queryTail = "WHERE id = " . (int)$this->id;
        }

        $readFromDB = $this->dbcon->query("SELECT * FROM " . $this->getTableName() . " " . $queryTail)->fetch(PDO::FETCH_OBJ);

        if (!$readFromDB) return false;

        foreach ($this->getColumns() as $column) {
            $this->$column = $readFromDB->$column;
        }

        return true;
    }

    public static function find($id)
    {
        $aNewArticle = new static;
        $aNewArticle->id = $id;
        if ($aNewArticle->populateFromDatabase())
            return $aNewArticle;

        return false;
    }

    public function getAllFromDB()
    {
        return $this->dbcon
            ->query("SELECT * FROM " . $this->getTableName() . " ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function all()
    {
        $articleHelperObj = new static;
        return $articleHelperObj->getAllFromDB();
    }

    public function delete()
    {
        $this->dbcon->exec("DELETE FROM " . $this->getTableName() . " WHERE id = " . $this->id);

        foreach ($this->getColumns() as $column) {
            $this->$column = null;
        }
    }
}
