<?php

require_once 'IQuery.php';

class UserEventsSelecting implements IQuery
{
    private string $user_id;

    public function __construct(string $user_id)
    {
        $this->user_id = $user_id;
    }

    public function GetParameters(): array
    {
        return array();
    }

    public function GetQuery(): string
    {
        return "SELECT id, title, date FROM events WHERE user_id = $this->user_id ORDER BY date";
    }
}