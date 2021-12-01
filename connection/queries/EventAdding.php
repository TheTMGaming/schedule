<?php

require_once 'IQuery.php';

class EventAdding implements IQuery
{
    private string $user_id;
    private string $title;
    private string $date;

    public function __construct(string $user_id, string $title,
                                string $day, string $month, string $year)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->date = date('Y-m-d', strtotime("$day $month $year"));
    }

    public function GetParameters(): array
    {
        return [
            'user_id' => $this->user_id,
            'title' => $this->title,
            'date' => $this->date
        ];
    }

    public function GetQuery(): string
    {
        return "INSERT INTO events VALUES (NULL, :user_id, :title, :date)";
    }
}