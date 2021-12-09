<?php

    require_once 'IQuery.php';

    class EmailSelecting implements IQuery
    {
        private string $email;

        public function __construct(string $email)
        {
            $this->email = $email;
        }

        public function GetParameters(): array
        {
            return array('email' => $this->email);
        }

        public function GetQuery(): string
        {
            return "SELECT email FROM users WHERE email =:email LIMIT 1";
        }
    }