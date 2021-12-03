<?php
    session_start();

    require_once 'Connection.php';
    require_once 'queries/UserDeleting.php';

    $connection = new Connection();

    $connection->Execute(new UserDeleting($_SESSION['user']['id']));

    unset($_SESSION['user']);

    header("Location: ../login.php");