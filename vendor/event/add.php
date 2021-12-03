<?php
    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/EventAdding.php';

    $user_id = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $connection = new Connection();

    try
    {
        $connection->Execute(new EventAdding($user_id, $title, $day, $month, $year));

        header('Location: ../../personal_events.php');
    }
    catch (PDOException $e)
    {
        $_SESSION['error_message'] = 'This event is already scheduled';

        header('Location: ../../new_event.php');
    }

