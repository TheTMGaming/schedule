<?php

require_once 'IQuery.php';

class EventsSelecting implements IQuery
{
    public function GetParameters(): array
    {
        return array();
    }

    public function GetQuery(): string
    {
        return "SELECT id, title, date FROM events ORDER BY date";
    }
}