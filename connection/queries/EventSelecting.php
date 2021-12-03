<?php

    require_once 'IQuery.php';

    class EventSelecting implements IQuery
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
            return "SELECT id, title, date FROM events WHERE id=:id";
        }
    }