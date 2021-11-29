<?php

require_once "queries/IQuery.php";

interface IDatabase
{
    public function Connect();
    public function Disconnect();
    public function Execute(IQuery $query) : array;
}