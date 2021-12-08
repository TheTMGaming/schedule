<?php

    require_once 'IQuery.php';

    class UserInserting implements IQuery
    {
        private string $login;
        private string $email;
        private string $password;

        public function __construct(string $login, string $email, string $password)
        {
            $this->login = $login;
            $this->email = $email;
            $this->password = $password;
        }

        public function GetParameters(): array
        {
            return [
                'login' => $this->login,
                'email' => $this->email,
                'password' => $this->password
            ];
        }

        public function GetQuery(): string
        {
            return "INSERT INTO users VALUES (NULL, :login, :email, :password)";
        }
    }