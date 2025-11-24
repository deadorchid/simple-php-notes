<?php

namespace Core;

class Database
{
    public $connection;
    public $statement;

    public function __construct($config)
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new \PDO($dsn, "root", 301583);
    }
    public function query($value, $params = [])
    {
        $statement = $this->connection->prepare($value);
        $statement->execute($params);

        $this->statement = $statement;

        return $this;
    }

    public function find($accessMethod = \PDO::FETCH_ASSOC)
    {
        return $this->statement->fetch($accessMethod);
    }

    public function findAll($accessMethod = \PDO::FETCH_ASSOC)
    {
        return $this->statement->fetchAll($accessMethod);
    }

    public function findOrFail($accessMethod = \PDO::FETCH_ASSOC)
    {
        $note = $this->find($accessMethod);

        if (!$note) {
            abort();
        }
        return $note;
    }
}
