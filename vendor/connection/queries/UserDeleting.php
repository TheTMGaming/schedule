<?php

    require_once 'IQuery.php';

    class UserDeleting implements IQuery
    {
        private int $id;

        public function __construct(int $id)
        {
            $this->id = $id;
        }

        public function GetParameters(): array
        {
            return array('id' => $this->id);
        }

        public function GetQuery(): string
        {
            return "DELETE FROM users WHERE id = :id";
        }
    }
