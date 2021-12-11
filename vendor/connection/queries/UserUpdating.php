<?php
    require_once 'IQuery.php';

    class UserUpdating implements IQuery
    {
        private int $id;
        private string $login;
        private string $email;
        private string $password;

        public function __construct(int $id, string $login, string $email, string $password)
        {
            $this->id = $id;
            $this->login = $login;
            $this->email = $email;
            $this->password = $password;
        }

        public function GetParameters(): array
        {
            return [
                'id' => $this->id,
                'login' => $this->login,
                'email' => $this->email,
                'password' => $this->password
            ];
        }

        public function GetQuery(): string
        {
            return "UPDATE users 
                    SET login = :login, email = :email, password = :password 
                    WHERE id = :id LIMIT 1";
        }
    }