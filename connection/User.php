<?php

class User
{
    private string $login;
    private string $email;
    private string $password;

    public function __construct(string $login, string $email, string $password)
    {
        $this->login = $login;
        $this->email = $email;
        $this->password = md5($password);
    }

    public function GetLogin(): string
    {
        return $this->login;
    }

    public function GetEmail(): string
    {
        return $this->email;
    }

    public function GetPassword(): string
    {
        return $this->password;
    }
}