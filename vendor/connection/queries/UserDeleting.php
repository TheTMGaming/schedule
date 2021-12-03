<?php

    require_once 'IQuery.php';

    class UserDeleting implements IQuery
    {
        private string $id;

        public function __construct(string $id)
        {
            $this->id = $id;
        }

        public function GetParameters(): array
        {
            return [
                'id' => $this->id
            ];
        }

        public function GetQuery(): string
        {
            return "DELETE FROM users WHERE id=:id";
        }
    }
