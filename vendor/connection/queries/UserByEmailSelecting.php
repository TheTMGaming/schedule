<?php

require_once 'UserByAttribute.php';

class UserByEmailSelecting extends UserByAttribute
{
    public function __construct(string $value)
    {
        parent::__construct($value, 'email');
    }
}