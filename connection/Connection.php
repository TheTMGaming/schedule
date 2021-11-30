<?php

require_once "queries/IQuery.php";

class Connection
{
    private string $host = 'schedule';
    private string $user = 'root';
    private string $password = '';
    private string $dbName = 'schedule';
    private string $charset = 'utf8';
    private array $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    private string $dsn;

    private PDO $connection;

    public function __construct()
    {
        $this->dsn = "mysql:host=$this->host;user=$this->user;dbname=$this->dbName;charset=$this->charset";
        $this->connection = new PDO($this->dsn, $this->user, $this->password, $this->options);
    }

    public function Execute(IQuery $query) : array
    {
        $statement = $this->connection->prepare($query->GetQuery());
        $statement->execute($query->GetParameters());

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}