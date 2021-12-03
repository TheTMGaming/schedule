<?php

    interface IQuery
    {
        public function GetParameters() : array;
        public function GetQuery() : string;
    }