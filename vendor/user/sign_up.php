<?php

    session_start();

    require_once '../connection/Connection.php';
    require_once '../connection/queries/UserInserting.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm)
    {
        $_SESSION['error_message'] = 'Password was not confirmed';

        header('Location: ../../registration.php');
        die();
    }

    $connection = new Connection();

    try
    {
        $connection->Execute(new UserInserting($login, $email, $password));

        header('Location: ../../authorization.php');
    }
    catch (PDOException $e)
    {
        $_SESSION['error_message'] = 'This user is already registered';

        header('Location: ../../registration.php');
    }

