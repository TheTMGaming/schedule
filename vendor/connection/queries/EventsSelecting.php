<?php

    require_once 'IQuery.php';

    class EventsSelecting implements IQuery
    {
        private ?int $user_id;

        public function __construct(int $user_id = null)
        {
            $this->user_id = $user_id;
        }

        public function GetParameters(): array
        {
            return $this->user_id != null
                ? array('user_id' => $this->user_id)
                : array();
        }

        public function GetQuery(): string
        {
            return "SELECT id, title, date 
                    FROM events"
                    . ($this->user_id != null
                        ? " WHERE user_id = :user_id "
                        : " ") .
                    "ORDER BY date";
        }
    }