<?php
    require_once 'IQuery.php';

    class EventUpdating implements IQuery
    {
        private string $id;
        private string $title;
        private string $date;

        public function __construct(string $id, string $title,
                                    string $day, string $month, string $year)
        {
            $this->id = $id;
            $this->title = $title;
            $this->date = date('Y-m-d', strtotime("$day $month $year"));
        }

        public function GetParameters(): array
        {
            return [
                'id' => $this->id,
                'title' => $this->title,
                'date' => $this->date
            ];
        }

        public function GetQuery(): string
        {
            return "UPDATE events SET title=:title, date=:date WHERE id=:id";
        }
    }