<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/EventUpdating.php';

    if (!isset($_SESSION['user']))
    {
        header("Location: ../authorization.php");
        die();
    }

    $id = $_POST['id'];
    $connection = new Connection();

    try
    {
        $connection->Execute(new EventUpdating(
            $id, $_POST['title'], $_POST['day'], $_POST['month'], $_POST['year']));

        header("Location: ../personal_events.php");
    }
    catch (Exception $e)
    {
        $_SESSION['error_message'] = "This event is already scheduled";
        header("Location: ../../edit.php?id=$id");
    }

