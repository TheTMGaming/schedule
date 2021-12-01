<?php
    require_once 'Connection.php';
    require_once 'queries/EventDeleting.php';

    $connection = new Connection();

    $connection->Execute(new EventDeleting($_POST['id']));

    header("Location: ../personal.php");