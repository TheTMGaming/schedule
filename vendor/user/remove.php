<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/UserDeleting.php';

    if (!password_verify($_POST['password_confirm'], $_SESSION['user']['password']))
    {
        $_SESSION['error_message'] = 'Password was not confirmed';
        header('Location: ../../remove.php');
        die();
    }

    $connection = new Connection();

    $connection->Execute(new UserDeleting($_SESSION['user']['id']));

    unset($_SESSION['user']);

    $_SESSION['success_message'] = 'Profile was removed';
    header('Location: ../../authorization.php');