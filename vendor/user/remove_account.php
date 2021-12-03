<?php
    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/UserDeleting.php';

    $connection = new Connection();

    $connection->Execute(new UserDeleting($_SESSION['user']['id']));

    unset($_SESSION['user']);

    header("Location: ../../authorization.php");