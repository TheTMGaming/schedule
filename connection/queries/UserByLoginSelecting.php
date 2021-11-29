<?php

require_once 'UserByAttribute.php';

class UserByLoginSelecting extends UserByAttribute
{
    public function __construct(string $value)
    {
        parent::__construct($value, 'login');
    }
}
