<?php

    require_once '../connection/Connection.php';
    require_once '../connection/queries/EventDeleting.php';

    $connection = new Connection();

    $connection->Execute(new EventDeleting($_GET['id']));

    header('Location: ../../personal_events.php');
