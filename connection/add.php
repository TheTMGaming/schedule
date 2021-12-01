<?php
    session_start();

    require_once 'Connection.php';
    require_once 'queries/EventAdding.php';

    $user_id = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $connection = new Connection();

    try
    {
        $connection->Execute(new EventAdding($user_id, $title, $day, $month, $year));
    }
    catch (Exception $e)
    {
        $_SESSION['error_message'] = "This event is already scheduled";
        header("Location: ../new_event.php");
        die();
    }

    header("Location: ../personal.php");
