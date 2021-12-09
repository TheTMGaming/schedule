<?php

    require_once 'IQuery.php';

    class LoginSelecting implements IQuery
    {
        private string $login;

        public function __construct(string $login)
        {
            $this->login = $login;
        }

        public function GetParameters(): array
        {
            return array('login' => $this->login);
        }

        public function GetQuery(): string
        {
            return "SELECT login FROM users WHERE login =:login LIMIT 1";
        }
    }