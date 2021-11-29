<?php
require_once 'IQuery.php';

abstract class UserByAttribute implements IQuery
{
    private string $value;
    private string $attribute;

    public function __construct(string $value, string $attribute)
    {
        $this->value = $value;
        $this->attribute = $attribute;
    }

    public function GetParameters(): array
    {
        return [
            'value' => $this->value,
        ];
    }

    public function GetQuery(): string
    {
        return "SELECT * FROM users WHERE $this->attribute=:value LIMIT 1";
    }
}