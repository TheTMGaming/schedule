<?php

require_once "queries/IQuery.php";
require_once "IDatabase.php";

class Database implements IDatabase
{
    private string $host = 'schedule';
    private string $user = 'root';
    private string $password = '';
    private string $dbName = 'schedule';
    private string $charset = 'utf8';
    private array $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    private string $dsn;

    private PDO $connection;
    private PDOStatement $last_statement;

    public function __construct()
    {
        $this->dsn = "mysql:host=$this->host;user=$this->user;dbname=$this->dbName;charset=$this->charset";
    }

    public function Connect()
    {
        $this->connection = new PDO($this->dsn, $this->user, $this->password, $this->options);
    }

    public function Disconnect()
    {
        unset($this->connection);
    }

    public function Execute(IQuery $query) : array
    {
        $this->last_statement = $this->connection->prepare($query->GetQuery());
        $this->last_statement->execute($query->GetParameters());

        return $this->last_statement->fetchAll();
    }

    public function IsUpdatedLastQuery(): bool
    {
        return $this->last_statement?->rowCount() > 0;
    }
}