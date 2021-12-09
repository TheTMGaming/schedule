<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/EventUpdating.php';

    $id = $_POST['id'];
    $title = $_POST['title'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    try
    {
        $connection = new Connection();
        $connection->Execute(new EventUpdating($id, $title, $day, $month, $year));

        header('Location: ../../personal_events.php');
    }
    catch (PDOException $e)
    {
        $_SESSION['error_message'] = 'This event is already scheduled';

        header("Location: ../../edit.php?id=$id");
    }

