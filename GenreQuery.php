<?php

require_once __DIR__ . '/Database.php';

class GenreQuery extends Database {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "
            SELECT DISTINCT genre_id, genre
            FROM songs
            INNER JOIN genres
            ON songs.genre_id = genres.id
            ORDER BY genre
        ";

        $statement = static::$pdo->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}