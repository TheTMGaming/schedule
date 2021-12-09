<?php

    require_once 'IQuery.php';

    class EventUpdating implements IQuery
    {
        private int $id;
        private string $title;
        private string $description;
        private string $date;

        public function __construct(int $id, string $title, string $description,
                                    int $day, string $month, int $year)
        {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->date = date('Y-m-d', strtotime("$day $month $year"));
        }

        public function GetParameters(): array
        {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'date' => $this->date
            ];
        }

        public function GetQuery(): string
        {
            return "UPDATE events SET title = :title, description = :description, date = :date WHERE id = :id";
        }
    }