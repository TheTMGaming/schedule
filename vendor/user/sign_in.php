<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/UserSelecting.php';

    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    $connection = new Connection();

    $info = $connection->Execute(new UserSelecting($identifier, $password));
    if (count($info) == 0)
    {
        $_SESSION['error_message'] = 'Invalid login/email or password';

        header('Location: ../../authorization.php');
        die();
    }

    $_SESSION['user'] = $info[0];
    header('Location: ../../personal_events.php');
