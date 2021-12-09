<?php

    require_once 'IQuery.php';


    class UserSelecting implements IQuery
    {
        private string $identifier;

        public function __construct(string $identifier)
        {
            $this->identifier = $identifier;
        }

        public function GetParameters(): array
        {
            return array('identifier' => $this->identifier);
        }

        public function GetQuery(): string
        {
            return "SELECT id, login, email, password 
                    FROM users 
                    WHERE login = :identifier OR email = :identifier LIMIT 1";
        }
    }
