<?php
    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/EventAdding.php';

    $user_id = $_SESSION['user']['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    try
    {
        $connection = new Connection();
        $connection->Execute(new EventAdding($user_id, $title, $description, $day, $month, $year));

        header('Location: ../../personal_events.php');
    }
    catch (PDOException $e)
    {
        $_SESSION['error_message'] = 'This event is already scheduled';

        header('Location: ../../new_event.php');
    }

