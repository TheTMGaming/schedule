<?php

    require_once 'IQuery.php';

    class EventSelecting implements IQuery
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
            return "SELECT id, title, description, date FROM events WHERE id = :id LIMIT 1";
        }
    }