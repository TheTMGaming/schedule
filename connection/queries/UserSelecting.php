<?php

require_once 'IQuery.php';


class UserSelecting implements IQuery
{
    private string $identifier;
    private string $password;

    public function __construct(string $identifier, string $password)
    {
        $this->identifier = $identifier;
        $this->password = md5($password);
    }

    public function GetParameters(): array
    {
        return [
            'identifier' => $this->identifier,
            'password' => $this->password
        ];
    }

    public function GetQuery(): string
    {
        return "SELECT id, login, email FROM users WHERE (login = :identifier OR email = :identifier) AND password = :password";
    }
}
